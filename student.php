<?php

class student implements proxy{
    //put your code here
    public $pa;
    public function __construct(teacher $pas) {
        $this->pa=$pas;
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