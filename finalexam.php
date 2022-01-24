<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of finalexam
 *
 * @author kirol
 */
include_once 'evaluation.php';
class finalexam implements evaluation {
    //put your code here
    public function finalterm($fileName) {
        echo "the finalexam is file upload"+$fileName;
    }

    public function midterm($fileName) {
        
    }

    public function participation($fileName) {
        
    }

    public function quiz($fileName) {
        
    }

}
