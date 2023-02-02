<?php
namespace App\Controller;


use App\Form\UserType;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherAwareInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;


class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function register(
      Request $request,
      UserPasswordHasherInterface $passwordEncoder,
      EntityManagerInterface $manager
    )
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);


        $form->handleRequest($request);


        if ($request->getMethod() == 'POST'){
            if ($form->isValid()) {
                $password = $passwordEncoder->hashPassword($user, $user->getPassword());
                $user->setPassword($password);
                $manager->persist($user);
                $manager->flush();
                return $this->redirectToRoute('login');
            }
        }


        return $this->render(
            'registration/register.html.twig',
            array('form' => $form->createView())
        );
    }
}