
<?php

include_once('./config/config.php');
include_once('./config/user.php');

$id = $_POST['id'];

function readUser ($id) {

    //*Connection to dB 

    //*dB credentials- defined with constant in config.php
        $connect = new PDO('mysql:dbname='.DBNAME, DBUSER, DBPWD);

    //* Set an attribute for PDO - Returns TRUE on success or FALSE on failure 
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //* Select ID for dB Table
        $request = $connect->prepare("SELECT * FROM user_tb_db WHERE id='$id';");

        $request->setFetchMode(PDO::FETCH_CLASS, 'User');
        $request->execute();
        return $request->fetch();
}

$user = readUser($id);

echo json_encode($user);


?>