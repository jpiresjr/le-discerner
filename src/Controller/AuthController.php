<?php
namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\AuthService;
use App\Service\PatientService;
use App\Service\ProfessionalService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/api/auth')]
class AuthController extends AbstractController
{
    private UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository,
    ) {
        $this->userRepository = $userRepository;
    }

    #[Route('/register', name: 'api_register', methods: ['POST'])]
    public function register(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $hasher,
        UserRepository $userRepository,
        PatientService $patientService,
        ProfessionalService $professionalService,
        AuthService $authService
    ): JsonResponse {

        $data = $request->request->all();

        $data['whatsapp'] = isset($data['whatsapp']);
        $data['telegram'] = isset($data['telegram']);

        $required = ['fullName','username','email','country','contact','password','role'];
        foreach ($required as $f) {
            if (empty($data[$f])) {
                return $this->json(['error' => "Missing field: $f"], 400);
            }
        }

        if ($userRepository->findOneBy(['email' => $data['email']])) {
            return $this->json(['error' => 'Email already registered'], 400);
        }

        $user = new User();
        $user->setFullName($data['fullName']);
        $user->setUsername($data['username']);
        $user->setEmail($data['email']);
        $user->setCountry($data['country']);
        $user->setContact($data['contact']);
        $user->setWhatsapp($data['whatsapp']);
        $user->setTelegram($data['telegram']);

        $role = $data['role'] === User::ROLE_PROFESSIONAL
            ? User::ROLE_PROFESSIONAL
            : User::ROLE_PATIENT;

        $user->setRoles([$role]);
        $user->setPassword($hasher->hashPassword($user, $data['password']));

        $em->persist($user);
        $em->flush();

        if ($role === User::ROLE_PATIENT) {
            $patientService->createFromPayload($data, $user);
        }

        if ($role === User::ROLE_PROFESSIONAL) {
            $professionalService->create($data, $user);
        }

        // 🔑 LOGIN AUTOMÁTICO
        $token = $authService->login($data['email'], $data['password']);

        return $this->json([
            'message' => 'User created',
            'token' => $token,
            'role' => $role
        ], 201);
    }

    #[Route('/login', name: 'api_login', methods: ['POST'])]
    public function login(
        Request $request,
        AuthService $authService,
        UserRepository $userRepository
    ): JsonResponse {

        $data = json_decode($request->getContent(), true);
        if (!is_array($data)) {
            $data = $request->request->all();
        }

        $identifier = trim((string) ($data['email'] ?? $data['username'] ?? ''));
        $password = (string) ($data['password'] ?? '');

        if ($identifier === '' || $password === '') {
            return $this->json(['error' => 'Email/usuário e senha são obrigatórios'], Response::HTTP_BAD_REQUEST);
        }

        $token = $authService->login($identifier, $password);

        if (!$token) {
            return $this->json(['error' => 'Credenciais inválidas'], Response::HTTP_UNAUTHORIZED);
        }

        $user = $userRepository->findOneBy(['email' => $identifier]);

        if (!$user) {
            $user = $userRepository->findOneBy(['username' => $identifier]);
        }

        if (!$user) {
            return $this->json(['error' => 'Usuário não encontrado'], Response::HTTP_NOT_FOUND);
        }

        // Criar resposta JSON
        $response = $this->json([
            'success' => true,
            'token' => $token,  // Ainda retorna para JS se necessário
            'user' => [
                'id' => $user->getId(),
                'email' => $user->getEmail(),
                'fullName' => $user->getFullName(),
                'roles' => $user->getRoles()
            ]
        ]);

        // 🔐 ADICIONAR COOKIE SEGURO HTTP-only
        $response->headers->setCookie(new Cookie(
            'AUTH_TOKEN',           // Nome do cookie
            $token,                 // Valor (token JWT)
            time() + 86400,         // Expira em 24 horas
            '/',                    // Disponível em todo o site
            null,                   // Domínio (atual)
            $request->isSecure(),   // Secure: true se HTTPS
            true,                   // HTTP-only: JavaScript NÃO acessa
            false,                  // Raw
            Cookie::SAMESITE_STRICT // SameSite: mais seguro
        ));

        return $response;
    }

    #[Route('/login', name: 'api_login_get', methods: ['GET'])]
    public function loginMethodNotAllowed(): JsonResponse
    {
        return $this->json(
            ['error' => 'Método não permitido. Use POST para autenticar.'],
            Response::HTTP_METHOD_NOT_ALLOWED
        );
    }

    #[Route('/logout', name: 'api_logout', methods: ['POST'])]
    public function logout(): JsonResponse
    {
        $response = $this->json(['success' => true, 'message' => 'Logout realizado']);

        // Remove o cookie
        $response->headers->clearCookie('AUTH_TOKEN', '/', null, true, true, Cookie::SAMESITE_STRICT);

        return $response;
    }


    #[Route('/me', name: 'api_me', methods: ['GET'])]
    public function me(Request $request): JsonResponse
    {
        /** @var User $user */
        $user = $this->getUser();
        if (!$user) {
            return $this->json(['error' => 'Unauthenticated'], 401);
        }

        return $this->json([
            'id' => $user->getId(),
            'fullName' => $user->getFullName(),
            'email' => $user->getEmail(),
            'username' => $user->getUsername(),
            'country' => $user->getCountry(),
            'contact' => $user->getContact(),
            'roles' => $user->getRoles()
        ]);
    }
}
