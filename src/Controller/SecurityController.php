<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        if ($this->getUser()==null) {
            $user = 'not logined...';
        } else {
            $user = 'logined: ' . $this->getUser()->getUsername();
        }

        return $this->render('security/login.html.twig', array('error'=>$error, 'user'=>$user,));
    }
}