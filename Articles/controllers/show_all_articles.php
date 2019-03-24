<?php

include_once('./config/config.php');


// create function for the foreach (arrays and objects) in index_articles.php

// function readAllArticles() {

//     $connect = new PDO('mysql:dbname='.DBNAME, DBUSER, DBPWD);
//     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     $request = $connect->prepare("SELECT * FROM article_table");

//     $request->execute();
//     return $request->fetchAll(PDO::FETCH_ASSOC);
// }
// $article_tables = readAllArticles(); 




function readAllArticles() {

    $connect = new PDO('mysql:dbname='.DBNAME, DBUSER, DBPWD);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $request = $connect->prepare("SELECT * FROM article_table");

    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}
$article_tables = readAllArticles(); 