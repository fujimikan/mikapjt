<?php
namespace App\Validator\Constraints;


use Symfony\Component\Validator\Constraint;


/**
 * @Annotation
 */
class NeverUpper extends Constraint
{
    public $message = '* "{{value}}" には大文字が含まれています。';
}
