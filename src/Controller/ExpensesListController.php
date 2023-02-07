<?php
namespace App\Controller;

use App\Entity\TrnExpenses;
use App\Form\ExpensesType;
use App\Repository\TrnExpensesRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class ExpensesListController extends AbstractController
{
    /**
     * @Route("/expenses", name="expenses")
     */
    public function index(TrnExpensesRepository $repository)
    {
        $data = $repository->findall();
        return $this->render('expenseslist/index.html.twig',[
            'title'=>'経費精算システム',
            'data'=>$data,
        ]);

    }

    #[Route('/expenses/create/{id}', name:'expenses/create', defaults:["id"=> 0])]
    public function create(
        $id,
        Request $request,
        ValidatorInterface $validator,
        TrnExpensesRepository $expensesRepository,
        EntityManagerInterface $manager
    )
    {
        if ($id == 0) {
            $expenses = new TrnExpenses();
        } else {
            $expenses = $expensesRepository->find($id);
        }
        $form = $this->createForm(ExpensesType::class, $expenses);
        $form->handleRequest($request);

        if ($request->getMethod() == 'POST') {
            $expenses = $form->getData();
            $errors = $validator->validate($expenses);
            if (count($errors) == 0) {
                $manager->persist($expenses);
                $manager->flush();
                return $this->redirect('/expenses');
            } else {
                $msg = "oh...can't posted...";
            }
        } else {
            $msg = 'Type your message!';
        }
        return $this->render('expenseslist/create.html.twig', [
            'title' => 'Hello',
            'message' => $msg,
            'form' => $form->createView(),
        ]);
    }

}