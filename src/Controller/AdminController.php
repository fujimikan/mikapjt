<?php
namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractController
{
    /**
     * @Route("/admin")
     */
    public function admin()
    {
        return $this->render('admin/admin.html.twig', [
            'title' => 'Admin',
            'message' => 'admin page',
            'user' => $this->getUser(),
        ]);
    }


}