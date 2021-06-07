<?php

namespace App\Controller;

use App\Repository\ArchivesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class AccueilController extends AbstractController
{
    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/", name="accueil")
     */
    public function index(ArchivesRepository $archives): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
            'count' => $archives->findAll(),
            'naissance' => $archives->findByType('Naissance'),
            'mariage' => $archives->findByType('Mariage'),
            'deces' => $archives->findByType('Décès'),
        ]);
    }

    /**
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     * @Route("/documentations", name="doc")
     */
    public function doc(): Response
    {
        return $this->render('accueil/doc.html.twig', [
            'controller_name' => 'AccueilController'
            /*'archives' => $archives->findCount(Archives::class)*/,
        ]);
    }
}