<?php

namespace App\Controller;

use App\Entity\Descriptions;
use App\Form\DescriptionsType;
use App\Repository\DescriptionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/descriptions")
 */
class DescriptionsController extends AbstractController
{
    /**
     * @Route("/", name="descriptions_index", methods={"GET"})
     */
    public function index(DescriptionsRepository $descriptionsRepository): Response
    {
        return $this->render('descriptions/index.html.twig', [
            'descriptions' => $descriptionsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/nouvelle_description", name="descriptions_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $description = new Descriptions();
        $form = $this->createForm(DescriptionsType::class, $description);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($description);
            $entityManager->flush();

            return $this->redirectToRoute('descriptions_index');
        }

        return $this->render('descriptions/new.html.twig', [
            'description' => $description,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="descriptions_show", methods={"GET"})
     */
    public function show(Descriptions $description): Response
    {
        return $this->render('descriptions/show.html.twig', [
            'description' => $description,
        ]);
    }

    /**
     * @Route("/{id}/modifier", name="descriptions_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Descriptions $description): Response
    {
        $form = $this->createForm(DescriptionsType::class, $description);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('descriptions_index');
        }

        return $this->render('descriptions/edit.html.twig', [
            'description' => $description,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="descriptions_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Descriptions $description): Response
    {
        if ($this->isCsrfTokenValid('delete' . $description->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($description);
            $entityManager->flush();
        }

        return $this->redirectToRoute('descriptions_index');
    }
}