<?php
include 'database.php';
session_start();
$mail = $_GET['mail'];
$msg = '';
$insert = "0:".$_GET['message'].",";
$rows = $conn->query("select messages from chats where email1='wassim' and email2='$mail'");
$ct = 0 ;
foreach($rows as $m){
$msg = $m[0];
$ct++;
}
if($ct == 0 ){
$conn->query("insert into chats value('wassim','$mail','$insert')");
}
else{
$msginsert = $msg. ' ' . $insert;
$conn->query("update chats set messages='$msginsert' where email2='$mail' and email1='wassim' ");


}
$_SESSION['mail']=$mail;
$_SESSION['user']=$_SESSION['userchats'];
header("Location : livechat.php");




?>