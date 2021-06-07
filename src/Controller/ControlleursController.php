<?php

namespace App\Controller;

use App\Entity\Controlleurs;
use App\Form\ControlleursType;
use App\Repository\ControlleursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_ADMIN")
 * @Route("/controlleurs")
 */
class ControlleursController extends AbstractController
{
    /**
     * @Route("/", name="controlleurs_index", methods={"GET"})
     */
    public function index(ControlleursRepository $controlleursRepository): Response
    {
        return $this->render('controlleurs/index.html.twig', [
            'controlleurs' => $controlleursRepository->findAll(),
        ]);
    }

    /**
     * @Route("/nouveau_controleur", name="controlleurs_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $controlleur = new Controlleurs();
        $form = $this->createForm(ControlleursType::class, $controlleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($controlleur);
            $entityManager->flush();

            return $this->redirectToRoute('controlleurs_index');
        }

        return $this->render('controlleurs/new.html.twig', [
            'controlleur' => $controlleur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="controlleurs_show", methods={"GET"})
     */
    public function show(Controlleurs $controlleur): Response
    {
        return $this->render('controlleurs/show.html.twig', [
            'controlleur' => $controlleur,
        ]);
    }

    /**
     * @Route("/{id}/modifier", name="controlleurs_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Controlleurs $controlleur): Response
    {
        $form = $this->createForm(ControlleursType::class, $controlleur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('controlleurs_index');
        }

        return $this->render('controlleurs/edit.html.twig', [
            'controlleur' => $controlleur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="controlleurs_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Controlleurs $controlleur): Response
    {
        if ($this->isCsrfTokenValid('delete' . $controlleur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($controlleur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('controlleurs_index');
    }
}