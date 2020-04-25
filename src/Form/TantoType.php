<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class TantoType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                '井川　雅央'=>1,
                '藤橋　美佳'=>2,
                '佐久間　耕太'=>3,
            )
        ));
    }

    public function getParent()
    {
        return ChoiceType::class;
    }
}