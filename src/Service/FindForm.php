<?php

namespace App\Service;

class FindForm
{
    private $find;
    
    public function getFind() {
        return $this->find;
    }
    
    public function setFind($find) {
        $this->find = $find;
    }
}