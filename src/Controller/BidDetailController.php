<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BidDetailController extends AbstractController
{
    #[Route('/bid/detail', name: 'app_bid_detail')]
    public function index(): Response
    {
        return $this->render('bid_detail/index.html.twig', [
            'controller_name' => 'BidDetailController',
        ]);
    }
}
