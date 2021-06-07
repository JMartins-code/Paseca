<?php

namespace App\Controller;

use App\Entity\Archivistes;
use App\Form\ArchivistesType;
use App\Repository\ArchivistesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @IsGranted("ROLE_ADMIN")
 * @Route("/archivistes")
 */
class ArchivistesController extends AbstractController
{
    /**
     * @Route("/", name="archivistes_index", methods={"GET"})
     */
    public function index(ArchivistesRepository $archivistesRepository): Response
    {
        return $this->render('archivistes/index.html.twig', [
            'archivistes' => $archivistesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/nouvel_archiviste", name="archivistes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $archiviste = new Archivistes();
        $form = $this->createForm(ArchivistesType::class, $archiviste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($archiviste);
            $entityManager->flush();

            return $this->redirectToRoute('archivistes_index');
        }

        return $this->render('archivistes/new.html.twig', [
            'archiviste' => $archiviste,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="archivistes_show", methods={"GET"})
     */
    public function show(Archivistes $archiviste): Response
    {
        return $this->render('archivistes/show.html.twig', [
            'archiviste' => $archiviste,
        ]);
    }

    /**
     * @Route("/{id}/modifier", name="archivistes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Archivistes $archiviste): Response
    {
        $form = $this->createForm(ArchivistesType::class, $archiviste);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('archivistes_index');
        }

        return $this->render('archivistes/edit.html.twig', [
            'archiviste' => $archiviste,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="archivistes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Archivistes $archiviste): Response
    {
        if ($this->isCsrfTokenValid('delete' . $archiviste->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($archiviste);
            $entityManager->flush();
        }

        return $this->redirectToRoute('archivistes_index');
    }
}