<?php

session_start();

$servername = "localhost";
$username = "lavanya";
$password = "password";
$dbname = 'test';


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_error()) {
  die('Database connection failed ' . mysqli_connect_error());
}

$uname = $_SESSION['uname'];
$sql = "SELECT * FROM books WHERE username='$uname' AND progress>'0' AND progress<'100';";
$res = $conn->query($sql);
$row = $res->fetch_all(MYSQLI_ASSOC);
error_reporting(E_ALL); ini_set('display_errors', 1);
?>


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
      echo "Progress - ".$book['progress']."<br>";
     echo "</div>";
  }
  ?>
  </div>