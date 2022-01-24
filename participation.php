<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of participation
 *
 * @author kirol
 */
include_once 'evaluation.php';
class participation implements evaluation{
    //put your code here
    public function finalterm($fileName) {
        
    }

    public function midterm($fileName) {
        
    }

    public function participation($fileName) {
         echo "the midterm is file upload"+$fileName;
    }

    public function quiz($fileName) {
        
    }

}
