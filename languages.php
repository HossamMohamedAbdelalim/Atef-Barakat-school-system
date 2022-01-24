<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of languages
 *
 * @author kirol
 */
class languages implements register{
    //put your code here
    public $ref=0;
    public function cancelregister() {
        $this->ref=0;
        echo 'cancelregister';
    }

    public function changeregisteration() {
        echo 'changeregisteration';
        
    }

    public function register() {
        echo 'register';
        $this->ref=1;
    }

    public function transferpapers() {
        echo 'transferpapers';
    }

}
