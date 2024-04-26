<?php
session_start();

// if (isset($_POST['login_submit'])) {
    $servername = "localhost";
    $username = "lavanya";
    $password = "password";
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];

    $dbname = 'test';


$conn = mysqli_connect($servername, $username, $password,$dbname);
if (mysqli_connect_error()) {
    die('Database connection failed '. mysqli_connect_error());
}
    $sql = "SELECT * FROM users WHERE username='$uname';";

    $res=$conn->query($sql);
    $row = mysqli_fetch_assoc($res);
    if ($row && $pass==$row['password']) 
   { 

    $_SESSION['loggedin'] = true;
    echo "<script>alert('Login successful!!')</script>";
    
    // $que = $_SESSION["q"];
    
    $name=$row['full_name'];
    $post=$row['post'];
    $_SESSION['uname']=$uname;
    echo $_SESSION['uname'];
    // header("Location: /home.php?name=$name&post=$post");
    if($post=="reader"){
    echo "<script>window.location.href = '/home.php?name=$name&post=$post'</script>";
    exit;
    }
    else{
      echo "<script>window.location.href = '/home_admin.php?name=$name&post=$post'</script>";

    }
}
else{
    $_SESSION["loggedin"] = false;
    echo "<script>alert('Incorrect Password !!')</script>";
    echo "<script>window.location.href = '/'</script>";
    exit;
}

?>