
<?php

include_once('../config/config.php');
include_once('../config/class_article.php');


$identity = $_POST['id'];
// var_dump($id);die;


function readArticle($identity) {


    $connect = new PDO('mysql:dbname='.DBNAME, DBUSER, DBPWD);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "ok";

    $request = $connect->prepare("SELECT * FROM article_table WHERE id='$identity';");

    $request->setFetchMode(PDO::FETCH_CLASS, 'ArticleClass');
    $request->execute();
    return $request->fetch();
   
}
$article_w = readArticle($identity);

echo json_encode($article_w);






?>