<?php
namespace App\Form;

use App\Entity\TrnExpenses;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints as Assert;

class ExpensesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('user_id', TantoType::class)
            ->add('reporting_date', DateTimeType::class,[
                'label'=>'日付',
                'format'=>'yyyy/MM/dd',
                'widget'=>'single_text',
                'attr' => ['class' => 'js-datepicker'],
            ])
            ->add('account_name', TextType::class)
            ->add('price', TextType::class)
            ->add('qty', TextType::class)
            ->add('note', TextType::class)
            ->add('save', SubmitType::class, array('label'=> '登録'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class'=>TrnExpenses::class));
    }
}