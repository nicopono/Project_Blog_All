<?php
include_once('./config/config.php');
include_once('./config/user.php');


//Connexion to dB to update content

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];


//*Connection to dB 

//*dB credentials- defined with constant in config.php

$connect = new PDO('mysql:dbname='.DBNAME, DBUSER, DBPWD);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connect->prepare("UPDATE user_tb_db 
                                 SET firstname = '$firstname' , lastname = '$lastname'  , email = '$email'  
                                 WHERE id='$id';");
$request->execute();




//*!-------------------------------------------------------------*/


//*Second connection to DB in order to Read the update

$connect = new PDO('mysql:dbname='.DBNAME, DBUSER, DBPWD);

$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);$

$id = $_POST['id'];

//Connection to dB 
//dB credentials- defined with constant in config.php
$request2 = $connect->prepare("SELECT * FROM user_tb_db WHERE id=$id;");

$request2->setFetchMode(PDO::FETCH_CLASS, 'User');
$request2->execute();
$target = $request2->fetch();

echo json_encode($target);


?>

