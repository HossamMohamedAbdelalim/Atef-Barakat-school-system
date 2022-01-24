<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        include_once './evaluation.php';
        include_once './evaluationadapter.php';
        include_once './facade.php';
        include_once './finalexam.php';
        include_once './midterm.php';
        include_once './participation.php';
        include_once './quiz.php';
        $test=new evaluationadapter($evu);
        $evu="quiz";
        $test->evaluate($evu);
        $test2=new evaluationadapter($evu);
        $evu="midterm";
        $test2->evaluate($evu);
        $test3=new evaluationadapter($evu);
        $evu="finalexam";
        $test3->evaluate($evu);
        
        ?>
    </body>
</html>
