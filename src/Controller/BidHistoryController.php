<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BidHistoryController extends AbstractController
{
    #[Route('/bidHistory', name: 'app_bid_history')]
    public function index(): Response
    {
        return $this->render('bid_history/index.html.twig', [
            'controller_name' => 'BidHistoryController',
        ]);
    }
}
