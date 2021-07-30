<?php
require_once "autoload.php";
	session_start();
  	if (!isset($_SESSION['usuario']))
  		header("location:../UI/login.php");
