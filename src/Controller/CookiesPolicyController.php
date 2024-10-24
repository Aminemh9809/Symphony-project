<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CookiesPolicyController extends AbstractController
{
    #[Route('/cookiesPolicy', name: 'app_cookies_policy')]
    public function index(): Response
    {
        return $this->render('cookies_policy/index.html.twig', [
            'controller_name' => 'CookiesPolicyController',
        ]);
    }
}
