<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TermConditionController extends AbstractController
{
    #[Route('/term/condition', name: 'app_term_condition')]
    public function index(): Response
    {
        return $this->render('term_condition/index.html.twig', [
            'controller_name' => 'TermConditionController',
        ]);
    }
}
