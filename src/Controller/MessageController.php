<?php

namespace App\Controller;

use App\Entity\Person;
use App\Entity\Message;
use App\Repository\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Form\PersonType;
use App\Form\MessageType;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;

class MessageController extends AbstractController
{
    /**
     * @Route("/message", name="message")
     */
    public function index(MessageRepository $repository)
    {
        $data = $repository->findAll();
        return $this->render('message/index.html.twig', [
            'title'=>'Mesaage',
            'data'=>$data,
        ]);
    }

    /**
     * @Route("/message/create", name="message/create")
     */
    public function create(Request $request, ValidatorInterface $validator)
    {
        $message = new Message();
        $form = $this->createForm(MessageType::class, $message);
        $form->handleRequest($request);

        if ($request->getMethod()=='POST'){
            $message=$form->getData();
            $errors=$validator->validate($message);
            if (count($errors) == 0) {
                $manager=$this->getDoctrine()->getManager();
                $manager->persist($message);
                $manager->flush();
                return $this->redirect('/message');
            } else {
                $msg = "oh...can't posted...";
            }
        } else {
            $msg = 'type for message!';
        }
        return $this->render('message/create.html.twig',[
           'title'=>'Hello',
           'message'=>$msg,
           'form'=>$form->createView(),
        ]);
    }
    /**
     * @Route("/message/page/{page}", name="message/page")
     */
    public function page($page=1)
    {
        $limit = 3;
        $repository = $this->getDoctrine()
            ->getRepository(Message::class);
        $paginator = $repository->getPage($page,$limit);
        $maxPages = ceil($paginator->count() / $limit);
        return $this->render('message/page.html.twig',[
            'title' => 'Message',
            'data' => $paginator->getIterator(),
            'maxPages' => $maxPages,
            'thisPage'=>$page,
        ]);
    }
}
