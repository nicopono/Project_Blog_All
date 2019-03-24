

<?php

include_once('../config/config.php');
include_once('../config/class_article.php');

//start data from JS
$id = $_POST['id'];
$titledB = $_POST['title1'];
$contentdB = $_POST['content1'];
// end data from JS

$connect = new PDO('mysql:dbname='.DBNAME, DBUSER, DBPWD);
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $connect->prepare("UPDATE article_table
                                 SET titledB = '$titledB' , contentdB = '$contentdB' 
                                 WHERE id='$id';");
$request->execute();

//*!-------------------------------------------------------------*/


$request2 = $connect->prepare("SELECT * FROM article_table WHERE id=$id;");

$request2->setFetchMode(PDO::FETCH_CLASS, 'ArticleClass');
$request2->execute();

$target = $request2->fetch();

echo json_encode($target);