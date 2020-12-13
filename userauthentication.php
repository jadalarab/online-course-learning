<?php
session_start();
if(!isset($_SESSION['user'])){
	echo 'You should login as a student before accessing the page';
	exit();
}

?>