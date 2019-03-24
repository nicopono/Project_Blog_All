

<?php

include_once('./config/config.php');
include_once('./config/class/response.php');
include_once('./config/class/response_success.php');
include_once('./config/class/response_failure.php');





$response = new ResponseFailure(false, "User pas ok");
$response = new ResponseSuccess(true, "User ok", null);
// echo json_encode($response);


//1 Récupération des paramettres de la requête AJAX
//1 $_POST['first'] --- recuperation firstname dans JS data.append('first')

$firstname   =  $_POST['first'];
$lastname = $_POST['last'];
$email = $_POST['address'];

// END 1

//Connection to dB 
//dB credentials- defined with constant in config.php
    $connect = new PDO('mysql:dbname='.DBNAME, DBUSER, DBPWD);


    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Access to dB table content and use SQL command INSERT INTO table

    $request = $connect->prepare("INSERT INTO user_tb_db (firstname, lastname, email) 
                                    VALUES ('$firstname','$lastname', '$email');");

//Execution of $request   
    $request->execute();


    

?>
