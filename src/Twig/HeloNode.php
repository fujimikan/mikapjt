<?php
namespace App\Twig;


class HeloNode extends \Twig_Node
{
    public function __construct($values, $names, $line, $tag = null)
    {
        parent::__construct($values, $names, $line, $tag);
    }


    public function compile(\Twig_Compiler $compiler)
    {
        $name = 'noname';
        $age = 0;
        $email = 'no@mail';

        for($i = 0; $i < 3; $i++){
            if ($this->getAttribute('name' . $i) == 'name'){
                $name = $this->getNode('value' . $i);
            }
            if ($this->getAttribute('name' . $i) == 'age'){
                $age = $this->getNode('value' . $i);
            }
            if ($this->getAttribute('name' . $i) == 'mail'){
                $mail = $this->getNode('value' . $i);
            }
        }

        $compiler
            ->addDebugInfo($this)
            ->raw("echo 'Hello, I am ' . ")
            ->subcompile($name)
            ->raw(" . '(' . ")
            ->subcompile($age)
            ->raw(" . ').<br> please mail to ' . ")
            ->subcompile($mail)
            ->raw(" . '!';\n");
    }
}