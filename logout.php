<?php
require 'MY DB.php';
$_SESSION=[];
session_unset();
session_destroy();
header("location:login.php);
