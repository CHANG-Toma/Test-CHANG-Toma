<?php

namespace App\Controller;

use App\Entity\Estimate;
use App\Form\EstimateType;
use App\Repository\EstimateRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/estimate')] // Préfixe de toutes les routes de ce controller
class EstimateController extends AbstractController
{
    // Afficher la liste des devis
    #[Route('/', name: 'app_estimate_index', methods: ['GET'])]
    public function index(EstimateRepository $estimateRepository): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'estimates' => $estimateRepository->findAll(),
            'path' => './dashboard/pages/estimate/estimate.html.twig',
        ]);
    }

    // Créer un nouveau devis
    #[Route('/new', name: 'app_estimate_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $estimate = new Estimate();
        $form = $this->createForm(EstimateType::class, $estimate);
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
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

    // Afficher un devis
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

    // Modifier un devis
    #[Route('/{id}/edit', name: 'app_estimate_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Estimate $estimate, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(EstimateType::class, $estimate);
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            if (!$estimate->getEstimatedate()) {
                $estimate->setEstimatedate(new \DateTime());
            }

            $entityManager->flush();

            return $this->redirectToRoute('app_estimate_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('dashboard/index.html.twig', [
            'estimate' => $estimate,
            'form' => $form,
            'path' => './dashboard/pages/estimate/edit.html.twig',
        ]);
    }

    // Supprimer un devis
    #[Route('/{id}', name: 'app_estimate_delete', methods: ['POST'])]
    public function delete(Request $request, Estimate $estimate, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $estimate->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($estimate);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_estimate_index', [], Response::HTTP_SEE_OTHER);
    }

    // Télécharger un devis en pdf
    #[Route('/{id}/pdf', name: 'app_estimate_pdf', methods: ['GET'])]
    public function downloadPdf(Request $request, Estimate $estimate, \Twig\Environment $twig): Response
    {
        // Configuration de dompdf
        $dompdf = new \Dompdf\Dompdf();
        $dompdf->setPaper('A4', 'portrait');

        // template html qui sera converti en pdf
        $html = $twig->render('dashboard/pages/estimate/estimate_pdf.html.twig', [
            'estimate' => $estimate
        ]);

        // charger le html dans dompdf
        $dompdf->loadHtml($html);
        // créer le pdf
        $dompdf->render();
        // Pour télécharger le pdf avec le nom du client
        $dompdf->stream("Devis-{$estimate->getClientName()}.pdf", [
            'Attachment' => 1 // mettre à 0 pour avoir un visu avant de DL
        ]);

        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf'
        ]);
    }
}
