<?php
namespace App\Controller;

use App\Entity\Person;
use App\Form\HelloType;
use App\Form\PersonType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use phpDocumentor\Reflection\Types\Integer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use App\Service\MyService;

class ItemlistController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function main(Request $request, MyService $service, int $int=1)
    {
        return $this->render('itemlist/main.html.twig', [
            'title'=>'Hello.',
            'number'=>123450011,
        ]);
    }


    /**
     * @Route("/hello/{id}", name="hello")
     */
    public function index(Request $request, int $id=1, MyService $service)
    {
        $person = $service->getPerson($id);
        $msg = $person == null ? 'no person.' : 'name:' . $person;
        return $this->render('itemlist/index.html.twig', [
            'title' => 'Hello',
            'message' => $msg,
        ]);
    }

    /**
     * @Route("/clear", name="clear")
     */
    public function clear(Request $request, SessionInterface $session)
    {
        $session->getFlashBag()->clear();
        return $this->redirect('/hello');
    }


    /**
     * @Route("/find/{id}", name="find")
     */
    public  function find(Request $request, Person $person)
    {
        return $this->render('itemlist/find.html.twig',[
            'title'=>'Hello',
            'data'=>$person,
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request)
    {
        $person = new Person();
        $form = $this->createFormBuilder(PersonType::class, $person);
        $form->handleRequest($request);

        if($request->getMethod()=='POST'){
            $person=$form->getData();
            $manager=$this->getDoctrine()->getManager();
            $manager->persist($person);
            $manager->flush();
            return $this->redirect('/hello');
        } else {
            return $this->render('itemlist/create.html.twig',[
                'title'=>'Hello',
                'message'=>'Create Entity',
                'form'=>$form->createView(),
            ]);
        }
    }

    /**
     * @route("/update/{id}", name="update")
     */
    public function update(Request $request, Person $person)
    {
        $form = $this->createFormBuilder($person)
            ->add('name', TextType::class)
            ->add('mail', TextType::class)
            ->add('age', IntegerType::class)
            ->add('save', SubmitType::class, array('label'=>'Click'))
            ->getForm();

        if ($request->getMethod()=='POST'){
            $form->handleRequest($request);
            $person=$form->getData();
            $manager=$this->getDoctrine()->getManager();
            $manager->flush();
            return $this->redirect('/hello');
        } else {
            return $this->render('itemlist/create.html.twig',[
                'title'=>'Hello',
                'message'=>'Update Entity id=' . $person->getId(),
                'form'=>$form->createView(),
            ]);
        }
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete(Request $request, Person $person)
    {
        $form = $this->createFormBuilder($person)
            ->add('name', TextType::class)
            ->add('mail', TextType::class)
            ->add('age', IntegerType::class)
            ->add('save', SubmitType::class, array('label'=>'Click'))
            ->getForm();

        if($request->getMethod()=='POST'){
            $form->handleRequest($request);
            $person=$form->getData();
            $manager=$this->getDoctrine()->getManager();
            $manager->remove($person);
            $manager->flush();
            return $this->redirect('/hello');
        } else {
            return $this->render('itemlist/create.html.twig',[
                'title'=>'Hello',
                'message'=>'Delete Entity id=' . $person->getId(),
                'form'=>$form->createView(),
            ]);
        }
    }
}
