<?php
namespace  App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class PriceTwigExtension extends AbstractExtension
{
    public function getFilters()
    {
        return [
            new TwigFilter('price', [$this, 'priceFilter']),
        ];
    }

    public function priceFilter($number, $header='¥', $decimals=0)
    {
        $price = number_format($number, $decimals, '.', ',');
        return $header . $price;
    }
}