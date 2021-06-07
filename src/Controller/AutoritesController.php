<?php

namespace App\Controller;

use App\Entity\Autorites;
use App\Form\AutoritesType;
use App\Repository\AutoritesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_ADMIN")
 * @Route("/autorites")
 */
class AutoritesController extends AbstractController
{
    /**
     * @Route("/", name="autorites_index", methods={"GET"})
     */
    public function index(AutoritesRepository $autoritesRepository): Response
    {
        return $this->render('autorites/index.html.twig', [
            'autorites' => $autoritesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/nouveau_autorite", name="autorites_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $autorite = new Autorites();
        $form = $this->createForm(AutoritesType::class, $autorite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($autorite);
            $entityManager->flush();

            return $this->redirectToRoute('autorites_index');
        }

        return $this->render('autorites/new.html.twig', [
            'autorite' => $autorite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="autorites_show", methods={"GET"})
     */
    public function show(Autorites $autorite): Response
    {
        return $this->render('autorites/show.html.twig', [
            'autorite' => $autorite,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="autorites_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Autorites $autorite): Response
    {
        $form = $this->createForm(AutoritesType::class, $autorite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('autorites_index');
        }

        return $this->render('autorites/edit.html.twig', [
            'autorite' => $autorite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="autorites_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Autorites $autorite): Response
    {
        if ($this->isCsrfTokenValid('delete' . $autorite->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($autorite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('autorites_index');
    }
}