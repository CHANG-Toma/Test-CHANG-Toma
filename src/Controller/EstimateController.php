<?php

namespace App\Controller;

use App\Entity\Estimate;
use App\Form\EstimateType;
use App\Form\EstimateFormType;
use App\Repository\EstimateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/estimate')]
class EstimateController extends AbstractController
{
    #[Route('/', name: 'app_estimate_index', methods: ['GET'])]
    public function index(EstimateRepository $estimateRepository): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'estimates' => $estimateRepository->findAll(),
            'path' => './dashboard/pages/estimate/estimate.html.twig',
        ]);
    }

    #[Route('/new', name: 'app_estimate_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $estimate = new Estimate();
        $form = $this->createForm(EstimateType::class, $estimate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if (!$estimate->getEstimatedate()) {
                $estimate->setEstimatedate(new \DateTime());
            }

            $entityManager->persist($estimate);
            $entityManager->flush();

            return $this->redirectToRoute('app_estimate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dashboard/index.html.twig', [
            'estimate' => $estimate,
            'form' => $form,
            'path' => './dashboard/pages/estimate/new.html.twig',
        ]);
    }

    #[Route('/{id}', name: 'app_estimate_show', methods: ['GET'])]
    public function show(Estimate $estimate, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EstimateType::class, $estimate, ['disabled' => true]);

        return $this->render('dashboard/index.html.twig', [
            'estimate' => $estimate,
            'form' => $form->createView(),
            'path' => './dashboard/pages/estimate/show.html.twig',
        ]);
    }

    #[Route('/{id}/edit', name: 'app_estimate_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Estimate $estimate, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EstimateType::class, $estimate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_estimate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('estimate/edit.html.twig', [
            'estimate' => $estimate,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_estimate_delete', methods: ['POST'])]
    public function delete(Request $request, Estimate $estimate, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $estimate->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($estimate);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_estimate_index', [], Response::HTTP_SEE_OTHER);
    }
}
