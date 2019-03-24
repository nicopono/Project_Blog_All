<?php
//Command to call file containing MySQL credentials
include_once('./config/config.php');

// setting up function
function PostAlluser_tb_db() {

//Connection to dB 
//dB credentials- defined with constant in config.php
    $connect = new PDO('mysql:dbname='.DBNAME, DBUSER, DBPWD);

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//*Access to dB table content and use SQL command INSERT INTO table
    $request = $connect->prepare("SELECT * FROM user_tb_db");

//*Execution of $request   
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
}

//*Define variable and call of the function.......................
$user_tb_dbs = PostAlluser_tb_db(); 

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" media="screen" href="./css/main.css">
    <script src="user_ajax.js"></script>
</head>


<body>
    <section>
        <form>
            <h1>Form:</h1>
            Firstname:<br>
            <input id="firstname" type="text" name="firstname">
            <br><br>
            Lastname:<br>
            <input id="lastname" type="text" name="lastname">
            <br><br>
            Email:<br>
            <input id="email" type="text" name="email">
            <!-- hidden button for ID recover when using update CRUD -->
            <input id="id_user" type="hidden">
            <br><br>
            <!-- function of articles.js containing variables for CRUD actions -->

            <input type="button" value="Create" onclick="createUser()">
            <button type="button" onclick="updateUser()">Update</button>
        </form>

        <!--Start DOM Div parent -->
        <div id="parentNewUser">
            <h1>Users:</h1>
            <!-- Setting up Foreach loop -->
            <?php foreach ($user_tb_dbs as $key => $user_tb_db): ?>
            <!-- echo contents of db table    -->
            <p id="user_<?php echo $user_tb_db['id'];?>">
                <?php echo $user_tb_db['firstname']." ".$user_tb_db['lastname']; ?>

                <!-- Button for CRUD action -->
                <button type="button" onclick="readUser(<?php echo $user_tb_db['id'] ?>)">Read</button>
                <?php echo $user_tb_db['id'] ?>
                <button type="button" onclick="deleteUser(<?php echo $user_tb_db['id'] ?>)">Delete</button>
                
            </p>
            <?php endforeach; ?>

        </div>
    </section>
</body>

</html>