


<?php

include_once('./config/config.php');
include_once('./config/user.php');


$id = $_POST['id'];



function deleteUser ($id) {

//Connection to dB 
//dB credentials- defined with constant in config.php
    $connect = new PDO('mysql:dbname='.DBNAME, DBUSER, DBPWD);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $request = $connect->prepare("DELETE FROM user_tb_db WHERE id='$id';");
    $request->setFetchMode(PDO::FETCH_CLASS, 'User');
    $request->execute();
}

$user = deleteUser($id);

echo json_encode($user);


?>