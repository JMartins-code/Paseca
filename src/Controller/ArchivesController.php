<?php

namespace App\Controller;

use App\Entity\Archives;
use App\Form\ArchivesType;
use App\Repository\ArchivesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/archives")
 */
class ArchivesController extends AbstractController
{
    /**
     * @IsGranted("ROLE_PRODU")
     * @Route("/", name="archives_index", methods={"GET"})
     */
    public function index(ArchivesRepository $archivesRepository): Response
    {
        return $this->render('archives/index.html.twig', [
            'archives' => $archivesRepository->findAll(),
        ]);
    }

    /**
     * @IsGranted("ROLE_PRODU")
     * @Route("/nouvelle_archive", name="archives_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $archive = new Archives();
        $form = $this->createForm(ArchivesType::class, $archive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($archive);
            $entityManager->flush();

            return $this->redirectToRoute('archives_index');
        }

        return $this->render('archives/new.html.twig', [
            //'archive' => $archive,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @IsGranted("ROLE_PRODU")
     * @Route("/{id}", name="archives_show", methods={"GET"})
     */
    public function show(Archives $archive): Response
    {
        return $this->render('archives/show.html.twig', [
            'archive' => $archive,
        ]);
    }

    /**
     * @IsGranted("ROLE_CONTR")
     * @Route("/{id}/modifier", name="archives_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Archives $archive): Response
    {
        $form = $this->createForm(ArchivesType::class, $archive);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('archives_index');
        }

        return $this->render('archives/edit.html.twig', [
            'archive' => $archive,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @IsGranted("ROLE_CONTR")
     * @Route("/{id}", name="archives_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Archives $archive): Response
    {
        if ($this->isCsrfTokenValid('delete' . $archive->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($archive);
            $entityManager->flush();
        }

        return $this->redirectToRoute('archives_index');
    }
}