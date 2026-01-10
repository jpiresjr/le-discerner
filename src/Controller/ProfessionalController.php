<?php

namespace App\Controller;

use App\Entity\Professional;
use App\Repository\ProfessionalRepository;
use App\Service\ProfessionalService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/professionals')]
class ProfessionalController extends AbstractController
{
    #[Route('', methods: ['GET'])]
    public function list(ProfessionalRepository $repo): JsonResponse
    {
        return $this->json($repo->findAll());
    }

    #[Route('', methods: ['POST'])]
    public function create(Request $request, ProfessionalService $service): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Unauthenticated'], 401);
        }

        $professional = $service->create($data ?? [], $user);

        return $this->json($professional, 201);
    }

    #[Route('/{id}', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function getOne(Professional $professional): JsonResponse
    {
        return $this->json($professional);
    }

    #[Route('/{id}', requirements: ['id' => '\d+'], methods: ['PUT'])]
    public function update(
        Professional $professional,
        Request $request,
        ProfessionalService $service
    ): JsonResponse {

        $data = json_decode($request->getContent(), true);
        $updated = $service->update($professional, $data);

        return $this->json($updated);
    }

    #[Route('/{id}', requirements: ['id' => '\d+'], methods: ['DELETE'])]
    public function delete(
        Professional $professional,
        EntityManagerInterface $em
    ): JsonResponse {

        $em->remove($professional);
        $em->flush();

        return $this->json(['message' => 'Professional removed']);
    }

    #[Route('/me', methods: ['GET'])]
    public function me(ProfessionalRepository $repo): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Unauthenticated'], 401);
        }

        $professional = $repo->findOneByUser($user);
        if (!$professional) {
            return $this->json(['error' => 'Professional profile not found'], 404);
        }

        $adDetails = $professional->getAdDetails();

        return $this->json([
            'id' => $professional->getId(),
            'expertise' => $professional->getExpertise(),
            'paymentCompleted' => $professional->isPaymentCompleted(),
            'adDetails' => $adDetails ? json_decode($adDetails, true) : null,
            'user' => [
                'id' => $user->getId(),
                'fullName' => $user->getFullName(),
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'country' => $user->getCountry(),
                'contact' => $user->getContact(),
                'whatsapp' => $user->isWhatsapp(),
                'telegram' => $user->isTelegram(),
                'roles' => $user->getRoles(),
            ],
        ]);
    }

    #[Route('/ad-details', methods: ['POST'])]
    public function saveAdDetails(
        Request $request,
        ProfessionalRepository $repo,
        EntityManagerInterface $em
    ): JsonResponse {
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Unauthenticated'], 401);
        }

        $professional = $repo->findOneByUser($user);
        if (!$professional) {
            return $this->json(['error' => 'Professional profile not found'], 404);
        }

        $data = $request->request->all();
        if (!$data) {
            $data = json_decode($request->getContent(), true);
        }

        $data = is_array($data) ? $data : [];

        $files = $request->files->all();
        try {
            foreach (['idDocumentFile' => 'idDocument', 'photoFile' => 'photo', 'councilDocFile' => 'councilDoc'] as $fileKey => $baseKey) {
                if (!isset($files[$fileKey])) {
                    continue;
                }

                $filePayload = $files[$fileKey];
                if (is_array($filePayload)) {
                    $names = [];
                    $paths = [];
                    foreach ($filePayload as $file) {
                        if ($file instanceof UploadedFile && $file->isValid()) {
                            $upload = $this->storeAdDetailsFile($file, $baseKey);
                            $names[] = $upload['name'];
                            $paths[] = $upload['path'];
                        }
                    }
                    if ($names) {
                        $data["{$baseKey}Name"] = $names;
                        $data["{$baseKey}Path"] = $paths;
                    }
                    continue;
                }

                if ($filePayload instanceof UploadedFile && $filePayload->isValid()) {
                    $upload = $this->storeAdDetailsFile($filePayload, $baseKey);
                    $data["{$baseKey}Name"] = $upload['name'];
                    $data["{$baseKey}Path"] = $upload['path'];
                }
            }
        } catch (\RuntimeException $exception) {
            return $this->json(['error' => $exception->getMessage()], 400);
        } catch (\Throwable $exception) {
            return $this->json(['error' => 'Não foi possível salvar o anúncio.'], 500);
        }

        $professional->setAdDetails(json_encode($data, JSON_UNESCAPED_UNICODE));
        $em->flush();

        return $this->json(['success' => true]);
    }

    private function storeAdDetailsFile(UploadedFile $file, string $prefix): array
    {
        $uploadDir = $this->getParameter('kernel.project_dir') . '/public/uploads/ad-details';
        if (!is_dir($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true) && !is_dir($uploadDir)) {
                throw new \RuntimeException('Não foi possível criar a pasta de uploads.');
            }
        }
        if (!is_writable($uploadDir)) {
            throw new \RuntimeException('A pasta de uploads não tem permissão de escrita.');
        }

        $originalName = $file->getClientOriginalName();
        $extension = null;
        try {
            $extension = $file->guessExtension();
        } catch (\Throwable $exception) {
            $extension = null;
        }
        $extension = $extension ?: $file->getClientOriginalExtension() ?: 'bin';
        $safePrefix = preg_replace('/[^a-zA-Z0-9_-]/', '', $prefix);
        $randomSuffix = null;
        try {
            $randomSuffix = bin2hex(random_bytes(8));
        } catch (\Throwable $exception) {
            $randomSuffix = uniqid('', true);
        }
        $filename = sprintf('%s-%s.%s', $safePrefix, $randomSuffix, $extension);
        $extension = $file->guessExtension() ?: $file->getClientOriginalExtension() ?: 'bin';
        $safePrefix = preg_replace('/[^a-zA-Z0-9_-]/', '', $prefix);
        $filename = sprintf('%s-%s.%s', $safePrefix, bin2hex(random_bytes(8)), $extension);

        try {
            $file->move($uploadDir, $filename);
        } catch (\Exception $exception) {
            throw new \RuntimeException('Não foi possível salvar o arquivo enviado.');
        }

        return [
            'name' => $originalName,
            'path' => '/uploads/ad-details/' . $filename,
        ];
    }
}
