<?php

session_start();



session_unset(); 

// destroy the session 
if(session_destroy())
header("Location: sign_in.php");
?>