<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class WinnerController extends AbstractController
{
    #[Route('/winner', name: 'app_winner')]
    public function index(): Response
    {
        return $this->render('winner/index.html.twig', [
            'controller_name' => 'WinnerController',
        ]);
    }
}
