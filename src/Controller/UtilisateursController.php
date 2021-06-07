<?php

namespace App\Controller;

use App\Entity\Utilisateurs;
use App\Form\RegistrationFormType;
use App\Repository\UtilisateursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/utilisateurs")
 */
class UtilisateursController extends AbstractController
{
    /**
     * @IsGranted("ROLE_CONTR")
     * @Route("/", name="utilisateurs_index")
     */
    public function index(UtilisateursRepository $repo): Response
    {
        return $this->render('security/index.html.twig', [
            'utilisateurs' => $repo->findAll(),
        ]);
    }

    /**
     * @Route("/connexion", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('accueil');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/deconnexion", name="app_logout")
     */
    public function logout(): Response
    {
        return $this->render('security/login.html.twig');
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    /**
     * @Route("/{id}", name="utilisateurs_show", methods={"GET"})
     */
    public function show(utilisateurs $utilisateur): Response
    {
        return $this->render('security/show.html.twig', [
            'utilisateur' => $utilisateur,
        ]);
    }

    /**
     * @Route("/{id}/modifier", methods={"GET","POST"}, name="modifier_profil")
     */
    public function editProfil(Request $request, Utilisateurs $user): Response
    {
        /*$user = $this->getUser();*/
        $form = $this->createForm(RegistrationFormType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('message', 'Votre profils a été mis à jour');
            return $this->redirectToRoute('accueil');
        }

        return $this->render('security/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/{id}", name="utilisateurs_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Utilisateurs $utilisateur): Response
    {
        if ($this->isCsrfTokenValid('delete' . $utilisateur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($utilisateur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('utilisateurs_index');
    }

    public function __toString()
    {
        return (string) $this->id;
    }
}