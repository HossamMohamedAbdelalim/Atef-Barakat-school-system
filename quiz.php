<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of quiz
 *
 * @author kirol
 */
include_once 'evaluation.php';
class quiz implements evaluation{
    //put your code here
    public function finalterm($fileName) {
        
    }

    public function midterm($fileName) {
        
    }

    public function participation($fileName) {
        
    }

    public function quiz($fileName) {
        echo "the quiz is file upload"+$fileName;
    }

}
