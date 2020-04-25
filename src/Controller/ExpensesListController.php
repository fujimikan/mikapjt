<?php
namespace App\Controller;

use App\Entity\TrnExpenses;
use App\Form\ExpensesType;
use App\Repository\TrnExpensesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;


class ExpensesListController extends AbstractController
{
    /**
     * @Route("/expenses", name="expenses")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(TrnExpenses::class);
        $data = $repository->findall();
        return $this->render('expenseslist/index.html.twig',[
            'title'=>'経費精算システム',
            'data'=>$data,
        ]);

    }

    /**
     * @Route("/expenses/create/{id}", name="expenses/create")
     */
    public function create(int $id = 0, Request $request, ValidatorInterface $validator, TrnExpensesRepository $expensesRepository)
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
                $manager = $this->getDoctrine()->getManager();
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