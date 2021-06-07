<?php

namespace App\Controller;

use App\Entity\Institutions;
use App\Form\InstitutionsType;
use App\Repository\InstitutionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_ADMIN")
 * @Route("/institutions")
 */
class InstitutionsController extends AbstractController
{
    /**
     * @Route("/", name="institutions_index", methods={"GET"})
     */
    public function index(InstitutionsRepository $institutionsRepository): Response
    {
        return $this->render('institutions/index.html.twig', [
            'institutions' => $institutionsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/nouvelle_institution", name="institutions_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $institution = new Institutions();
        $form = $this->createForm(InstitutionsType::class, $institution);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($institution);
            $entityManager->flush();

            return $this->redirectToRoute('institutions_index');
        }

        return $this->render('institutions/new.html.twig', [
            'institution' => $institution,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="institutions_show", methods={"GET"})
     */
    public function show(Institutions $institution): Response
    {
        return $this->render('institutions/show.html.twig', [
            'institution' => $institution,
        ]);
    }

    /**
     * @Route("/{id}/modifier", name="institutions_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Institutions $institution): Response
    {
        $form = $this->createForm(InstitutionsType::class, $institution);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('institutions_index');
        }

        return $this->render('institutions/edit.html.twig', [
            'institution' => $institution,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="institutions_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Institutions $institution): Response
    {
        if ($this->isCsrfTokenValid('delete' . $institution->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($institution);
            $entityManager->flush();
        }

        return $this->redirectToRoute('institutions_index');
    }
}