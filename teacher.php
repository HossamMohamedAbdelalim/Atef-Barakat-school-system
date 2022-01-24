<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of teacher
 *
 * @author kirol
 */
include_once 'proxy(register).php';
class teacher implements proxy{
    //put your code here
 
    public function editattendence() {
        echo'attendence';
    }
    public function attendencedetails() {
        echo'attendence is taken';
    }

    public function selfmark_attendence() {
        echo 'attendence options'
        . 'present'
        .  'absent'
        .  'late';
    }

}