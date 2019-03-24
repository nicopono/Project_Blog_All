<?php

include_once('Articles/config/config.php');
// include_once('Articles/config/class_article.php');


// $identity = $_POST['id'];
// var_dump($id);die;


// function readArticle($identity) {


    $connect = new PDO('mysql:dbname='.DBNAME, DBUSER, DBPWD);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $request = $connect->prepare("SELECT * FROM article_table WHERE id=27;");

    $request = $connect->prepare("SELECT * FROM article_table LIMIT 5;");

    // $request->setFetchMode(PDO::FETCH_CLASS, 'ArticleClass');
    $request->execute();
    $return = $request->fetchAll();
   

// }
// $article_w = readArticle(27);

echo json_encode($return);



?>
