<?php
require "libs/rb.php";

R::setup( 'mysql:host=db;dbname=weshare',
        'root', 'root' );

session_start();

?>