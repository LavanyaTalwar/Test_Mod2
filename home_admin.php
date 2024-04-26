<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
 
    .book_card{
      display: flex;
      flex-direction: column;
    }
  </style>
</head>
</html>
<?php
session_start();
if($_SESSION['loggedin']==true){

$servername = "localhost";
$username = "lavanya";
$password = "password";
$dbname = 'test';

$name = $_GET['name'];
$post = $_GET['post'];

echo "Welcome $name <br> This is $post window";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_error()) {
  die('Database connection failed ' . mysqli_connect_error());
}
$uname = $_SESSION['uname'];
$sql = "SELECT * FROM books ;";
$res = $conn->query($sql);
$row = $res->fetch_all(MYSQLI_ASSOC);


error_reporting(E_ALL); ini_set('display_errors', 1);
?>


 <div class="navbar">
    <a href="/home.php">Home</a>
    <a href="add_post.php">Create post</a>
    <a href="logout.php">Logout</a>
  </div>
<div class="books">

  <?php
  foreach ($row as $book) {
    ?>
    <div class="book_card">
    <img src="images/<?= $book['img'] ?>" alt="" width=400px style="">
    <div class="details">
      <?php
      echo "Book ID - ".$book['book_id']."<br>";
      echo "Book Name - ".$book['book_name']."<br>";
      echo "Progress - ".$book['progress']."%<br>";
     echo "</div>";
  }
  ?>
  </div>
</div>
</div>
<?php
}
else{
 header("Location:/");
}

?>

