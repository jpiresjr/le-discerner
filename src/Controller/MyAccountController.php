<?php

namespace App\Controller;

use App\Service\JwtHelperService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MyAccountController extends AbstractController
{
    #[Route('/my-account', name: 'my_account_redirect')]
    public function index(JwtHelperService $jwtService): Response
    {
        $user = $jwtService->getUserFromToken();

        if (!$user) {
            return $this->redirect('/login.html');
        }

        // Supondo que exista na entidade User algo como getType()
        $type = $user->getType();

        return match ($type) {
            'paciente'     => $this->redirect('/my-account/paciente.html'),
            'profissional' => $this->redirect('/my-account/profissional.html'),
            'admin'        => $this->redirect('/my-account/admin.html'),
            default        => $this->redirect('/login.html'),
        };
    }
}
