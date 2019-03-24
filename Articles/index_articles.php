<?php

// include_once ('C:\wamp64\www\GitHub\Project_Blog\Articles\index_articles.php');

?>


<!DOCTYPE html>
<html>
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="articles_ajax.js"></script>

</head>
<body>
    <section>
        <h2>New Article:</h2>
            <form>
            
                Title:<br>
                <input id="title" type="text" name="title">
            <br><br>
                Content:<br>
                <textarea id="content" cols="25" rows="5"></textarea>
                <input id="id_article" type="hidden">
            <br><br>

                <button type="button" onclick="createArticle()">Create</button> 
                <button type="button" onclick="updateArticle()">Update</button>
            </form>

    <div id="parentNewArticle">
        <h2>Articles:</h2>

        //* Path to file using WAMP in order to display foreach in HTML 
        <?php include_once ('C:\wamp64\www\GitHub\Project_Blog_All\Articles\controllers\show_all_articles.php'); ?>


        <?php foreach ($article_tables as $key => $article_x): ?>
        <p id="article_<?php echo $article_x['id'];?>">
            <?php echo $article_x['titledB']."--".$article_x['contentdB'] ?>

            <button onclick="readArticle(<?php echo $article_x['id'] ?>)">Read</button>
            
            <button onclick="deleteArticle(<?php echo $article_x['id'] ?>)">Delete</button>
            
        </p>
        <?php endforeach;  ?>
            
    </div>
    </section>   
</body>
</html>

