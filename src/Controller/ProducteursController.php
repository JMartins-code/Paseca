<?php

namespace App\Controller;

use App\Entity\Producteurs;
use App\Form\ProducteursType;
use App\Repository\ProducteursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/producteurs")
 */
class ProducteursController extends AbstractController
{
    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/", name="producteurs_index", methods={"GET"})
     */
    public function index(ProducteursRepository $producteursRepository): Response
    {
        return $this->render('producteurs/index.html.twig', [
            'producteurs' => $producteursRepository->findAll(),
        ]);
    }

    /**
     * @Route("/nouveau_producteur", name="producteurs_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $producteur = new Producteurs();
        $form = $this->createForm(ProducteursType::class, $producteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($producteur);
            $entityManager->flush();

            return $this->redirectToRoute('producteurs_index');
        }

        return $this->render('producteurs/new.html.twig', [
            'producteur' => $producteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="producteurs_show", methods={"GET"})
     */
    public function show(Producteurs $producteur): Response
    {
        return $this->render('producteurs/show.html.twig', [
            'producteur' => $producteur,
        ]);
    }

    /**
     * @Route("/{id}/modifier", name="producteurs_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Producteurs $producteur): Response
    {
        $form = $this->createForm(ProducteursType::class, $producteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('producteurs_index');
        }

        return $this->render('producteurs/edit.html.twig', [
            'producteur' => $producteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="producteurs_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Producteurs $producteur): Response
    {
        if ($this->isCsrfTokenValid('delete' . $producteur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($producteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('producteurs_index');
    }
}