<?php

require 'conect.php';
$pdo = new PDO(DSN, USER, PASS);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query); 

$friendsArray = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach($friendsArray as $friend) {
    echo $friend['firstname'] . ' ' . $friend['lastname'] .PHP_EOL;
}

$friendsObject = $statement->fetchAll(PDO::FETCH_OBJ);


foreach($friendsObject as $friend) {

    echo $friend->firstname . ' ' . $friend->lastname;

}


if ($_SERVER ['REQUEST_METHOD'] === 'POST') 
{
  $firstname = trim($_POST['firstname']);
  $lastname = trim($_POST['lastname']); 

  $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
  
  $statement = $pdo->prepare($query);

  $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);

  $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);


  $statement->execute();

  $query = "INSERT INTO friend (firstname, lastname) VALUES ('Rachel', 'Green')";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<form action=""  method="post">

    <label  for="title">Title :</label>

    <input  type="text"  id="title"  name="title">


    <label  for="content">Content :</label>

    <textarea name="content" id="content" cols="30" rows="10"></textarea>


    <label  for="author">Author :</label>

    <input  type="text"  id="author"  name="user_author">

    <button  type="submit">Creat a new book</button>

</form>


</body>
</html>