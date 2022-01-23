<?php

class usertypeFactory
{

    public function creatusertype()
    {
        return new usertype(type: 'teacher');
        return new usertype(type: 'student ');
        return new usertype(type: 'parent');
        return new usertype(type: 'admin');
        return new usertype(type: 'manager');
        return new usertype(type: 'supervisor');
        return new usertype(type: 'accountant');
    }

}




?>