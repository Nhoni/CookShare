<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: 'connexion', name: 'security.login', methods: ['GET', 'POST'])]
    public function login(): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('/home');
        // }

        // $error = $authenticationUtils->getLastAuthenticationError();
        // $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('pages/security/login.html.twig',[
            'controller_name'=>'SecurityController',
        ]);
    }
    
     #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
