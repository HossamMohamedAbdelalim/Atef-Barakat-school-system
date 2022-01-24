<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of midterm
 *
 * @author kirol
 */
include_once 'evaluation.php';
class midterm implements evaluation{
    //put your code here
    
    public function finalterm($fileName) {
        
    }

    public function midterm($fileName) {
        echo "the midterm is file upload"+$fileName;
    }

    public function participation($fileName) {
        
    }

    public function quiz($fileName) {
        
    }

}
