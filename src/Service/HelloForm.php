<?php

namespace App\Service;

class HelloForm
{
    private $name;
    private $mail;
    
    public function getName() {
        return $this->name;
    }
    
    public function setName($name) {
        $this->name = $name;
    }
    
    public function getMail() {
        return $this->mail;
    }
    
    public function setMail($mail) {
        $this->mail = $mail;
    }
    
    public function __toString() {
        return '*** ' . $this->name . '[' . $this->mail . '] ***';
    }
}