


<?php

include_once('../config/config.php');
include_once('../config/class_article.php');

$id = $_POST['id1'];



function deleteArticle ($id) {

    //Connection to dB 
    //dB credentials- defined with constant in config.php
        $connect = new PDO('mysql:dbname='.DBNAME, DBUSER, DBPWD);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        $request = $connect->prepare("DELETE FROM article_table WHERE id='$id';");
        $request->setFetchMode(PDO::FETCH_CLASS, 'ArticleClass');
        $request->execute();
    }
    
    $qqq = deleteArticle($id);
    
    echo json_encode($qqq);
    
    
    ?>