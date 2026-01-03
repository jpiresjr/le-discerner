<?php

namespace App\Controller\Dashboard;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/dashboard/patient')]
class PatientDashboardController extends AbstractController
{

    #[Route('', name: 'patient_dashboard')]
    public function index(): Response
    {
        ob_start();
        require __DIR__ . '/../../View/dashboard/patient.php';
        $content = ob_get_clean();

        $title = 'Meu Painel';
        $extraJs = ['/assets/js/dashboard-patient.js'];

        ob_start();
        require __DIR__ . '/../../View/layout.php';
        return new Response(ob_get_clean());
    }

    #[Route('/logout', name: 'patient_logout')]
    public function logout(): Response
    {
        // Redireciona para logout da API
        return $this->redirectToRoute('api_logout');
    }
}

