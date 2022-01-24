<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of evaluationadapter
 *
 * @author kirol
 */
include_once 'evaluation.php';
include_once 'facade.php';
include_once 'quiz.php';
include_once 'finalexam.php';
include_once 'participation.php';
include_once 'midterm.php';
class evaluationadapter implements evalutiontype{
    //put your code here
    public $ref;
    public function __construct($evu) {
        if($evu=="quiz")
        {
            $this->ref=new quiz();
            
        }
        if($evu=="participation")
        {
            $this->ref=new participation();
            
        }
        if($evu=="midterm")
        {
            $this->ref=new midterm();
            
        }
        if($evu=="final")
        {
            $this->ref=new finalexam();
            
        }
        
        
    }

    public function evaluate($evu) {
        if($evu=="quiz")
        {
            $this->ref=new quiz();
            
        }
        if($evu=="participation")
        {
            $this->ref=new participation();
            
        }
        if($evu=="midterm")
        {
            $this->ref=new midterm();
            
        }
        if($evu=="final")
        {
            $this->ref=new finalexam();
            
        }
    }

}
