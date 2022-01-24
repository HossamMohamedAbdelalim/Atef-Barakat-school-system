<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of student
 *
 * @author kirol
 */
include_once 'command.php';
include_once 'register.php';
class cancelregisteration implements command{
    //put your code here
    public $pa;
    public function __construct(register $pas) {
        $this->pa=$pas;
    }
    public function execute() {
        $this->pa->cancelregister();
    }

}
