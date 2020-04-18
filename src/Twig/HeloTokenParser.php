<?php
namespace App\Twig;


class HeloTokenParser extends \Twig_TokenParser
{
    public function parse(\Twig_Token $token)
    {
        $names = [];
        $values = [];

        $parser = $this->parser;
        $stream = $parser->getStream();
        for($i = 0; $i < 3; $i++){
            $names['name' . $i] = $stream->expect(\Twig_Token::NAME_TYPE)->getValue();
            $stream->expect(\Twig_Token::OPERATOR_TYPE, '=');
            $values['value' . $i] = $parser->getExpressionParser()->parseExpression();
        }
        $stream->expect(\Twig_Token::BLOCK_END_TYPE);

        return new HeloNode($values, $names, $token->getLine(), $this->getTag());
    }


    public function getTag()
    {
        return 'helo';
    }


}