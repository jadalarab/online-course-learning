<?php
session_start();
if(!isset($_SESSION['name'])){
	echo 'You should login as admin before accessing the page';
	exit();
}

?>