<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ThankYouController extends AbstractController
{
    #[Route('/thankYou', name: 'app_thank_you')]
    public function index(): Response
    {
        return $this->render('thank_you/index.html.twig', [
            'controller_name' => 'ThankYouController',
        ]);
    }
}
