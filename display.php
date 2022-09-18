<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>display</title>
<link rel="icon" type="image/x-icon" href="https://faberinfinite.com/wp-content/uploads/2017/11/favicon.png">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
</head>
<body class="bg-info">

<?php
session_start();

if(isset($_SESSION['u_id'])){

//local database
// $host = "localhost";
// $dbUsername = "root";
// $dbPassword = "";
// $dbName = "ani_database";
// $dbtable = "local_register";


//online database 
$host = "localhost";
$dbUsername = "all_user";
$dbPassword = "#123all@";
$dbName = "aniruddha";
$dbtable = "user";



//create connection 
$conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

//check connection 
if ($conn->connect_error) {
    die('Could not connect to the database.');
} else {
    // $my_id = $_GET['id'];
    $my_id = $_SESSION['u_id'];
    $sql = "SELECT * FROM $dbtable WHERE id = '$my_id'";
    $res = $conn->query($sql);
    $credential = $res->fetch_assoc();
}


echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>🙋‍ Welcome to your dashboard!</strong>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">×</span>
     </button>
     </div>';    

}

else {
    header('Location: login.html');
    exit;
}

?>



<div class="container">
<div class="row">
<div class="col-md-5 m-auto">
<div class="card p-4 mt-5">
<h2 class="text-center pb-4">This Is Your Data!</h2>


<div class="form-group">

<?php 
echo '+---------------------------------------------------------+<br>';
echo '<b>Name: </b>'." &nbsp;".$credential["name"].'<br>';



echo '+---------------------------------------------------------+<br>';
echo '<b>Email: </b>'." &nbsp;".$credential["email"].'<br>';


echo '+---------------------------------------------------------+<br>';
echo '<b>Age: </b>'." &nbsp;" .$credential["age"]. '<br>';




echo '+---------------------------------------------------------+<br>';
echo '<b>Phone: </b>'." &nbsp;".$credential["phone"].'<br>';



 
echo '+---------------------------------------------------------+<br>';
echo '<b>Gender: </b>'." &nbsp;".$credential["gender"].'<br>';
echo '+---------------------------------------------------------+<br><br>';

// session_destroy();
?>
</div>  

<div class="form-group row">
<div class="col-md-5 text-center">
<a href="login.html" class="btn btn-danger d-inline-block">LOGOUT</a>
</div>

<div class="col-md-6 text-center">
<a href="newuser.php?userId=<?php echo $_SESSION['u_id']; ?>" class="btn btn-warning">EDIT PROFILE</a>

<!-- <a href="newuser.php" class="btn btn-warning">EDIT PROFILE</a> -->
</div>

</div>                             

</div>
</div>
</div>
</div>
</form>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>



