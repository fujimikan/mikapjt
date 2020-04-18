<?php
namespace App\Twig;


use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use App\Twig\HeloTokenParser;


class HeloTwigExtension extends AbstractExtension
{
    public function getTokenParsers()
    {
        return [
            new HeloTokenParser(),
        ];
    }


}