<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
    }

    form {
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin: 20px auto;
      max-width: 500px;
    }

    form label {
      display: block;
      margin-bottom: 10px;
    }

    form input[type="file"],
    form textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 3px;
      box-sizing: border-box;
    }

    form input[type="submit"] {
      background-color: #337ab7;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 3px;
      cursor: pointer;
    }

    form input[type="submit"]:hover {
      background-color: #286090;
    }
  </style>

</head>
<body>

<form name="add_post-form" method="post" enctype="multipart/form-data">

  <label name="img">Select file to post: </label>
  <input type="file" name="img" id="">

  <label name="book_name">Book Name: </label>
  <input type="text" name="book_name" id="">

  <input type="submit" name="post_submit">
</form>
  
</body>
</html>

<?php
session_start();
$servername = "localhost";
$username = "lavanya";
$password = "password";
$dbname = 'test';


$book_name=$_POST['book_name'];
  

$image = $_FILES['img']['name'];
$temp = $_FILES['img']['tmp_name'];
move_uploaded_file($temp, "/var/www/phptest.com/html/images/$image");
$uname=$_SESSION['uname'];
// $this->insert($image,$caption,$uname);




$conn = mysqli_connect($servername, $username, $password, $dbname);
if (mysqli_connect_error()) {
  die('Database connection failed ' . mysqli_connect_error());
}
$sql="INSERT INTO books(book_name,img,username) VALUES('$book_name','$image','user1');";
$res = $conn->query($sql);
if($res){
echo "<script>alert('Data inserted')</script>";}
else{
  echo "Something went wrong";
}
