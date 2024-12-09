<?php

namespace App\Controller;

use App\Entity\Bids;
use App\Form\BidsType;
use App\Repository\BidsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/bids')]
final class BidsController extends AbstractController{
    #[Route(name: 'app_bids_index', methods: ['GET'])]
    public function index(BidsRepository $bidsRepository): Response
    {
        return $this->render('bids/index.html.twig', [
            'bids' => $bidsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_bids_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bid = new Bids();
        $form = $this->createForm(BidsType::class, $bid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bid);
            $entityManager->flush();

            return $this->redirectToRoute('app_bids_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bids/new.html.twig', [
            'bid' => $bid,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bids_show', methods: ['GET'])]
    public function show(Bids $bid): Response
    {
        return $this->render('bids/show.html.twig', [
            'bid' => $bid,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bids_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Bids $bid, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BidsType::class, $bid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_bids_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('bids/edit.html.twig', [
            'bid' => $bid,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bids_delete', methods: ['POST'])]
    public function delete(Request $request, Bids $bid, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bid->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($bid);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_bids_index', [], Response::HTTP_SEE_OTHER);
    }
}
