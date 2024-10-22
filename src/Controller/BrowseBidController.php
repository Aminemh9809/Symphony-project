<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BrowseBidController extends AbstractController
{
    #[Route('/browse/bid', name: 'app_browse_bid')]
    public function index(): Response
    {
        return $this->render('browse_bid/index.html.twig', [
            'controller_name' => 'BrowseBidController',
        ]);
    }
}
