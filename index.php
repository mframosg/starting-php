<?php

    $dbHost = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "person";

    try{
        $dsn = "mysql:host=".$dbHost.";dbname=".$dbName;
        $pdo = new PDO($dsn, $dbUser, $dbPassword);
    }catch(PDOException $e){
        echo "DB conexion failed: ". $e->getMessage();
    }

    $status = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST'):
        $name = $_POST['name'];
        if (empty($name)):
            $status = "The field name is required";
        endif;
        $sql = "INSERT INTO names (name) VALUES (:name)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $name]);

        $status = "Your name was successfully saved";
        $name = "";
    endif;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <main class="main-container">
        <form class="form" action="" method="post">
            <label class="form__label" for="name">Name</label>
            <input class="form__input-text" name="name" type="text" placeholder="Insert your name here"  >
            <button class="form__button" type="submit">Submit</button>
        </form>
    </main>
</body>
</html>