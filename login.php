 <?php
session_start();
// if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $email = rtrim($_POST['emailid']);
        $pass = $_POST['passid'];

        // echo '<b>Email: </b>'.$email.'<br>';
        // echo '<b>Pass: </b>'.$pass.'<br>';
        

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
        }
        
        else {
            // Checking given email:pass with the email:pass data present in database.
            $sql = "SELECT * FROM $dbtable WHERE email = '$email' AND pass= '$pass'";
            $res = $conn->query($sql);
            $credential = $res->fetch_assoc();

            // Taking all the values of a particular user by refering the email.
            // echo '<b>Name: </b>'.$credential["name"].'<br>';
            // echo '<b>Email: </b>'.$credential["email"].'<br>';
            // echo '<b>Age: </b>'.$credential["age"].'<br>';
            // echo '<b>Phone: </b>'.$credential["phone"].'<br>';
            // exit; 
            
            if($credential && $credential["pass"] == $pass){
                $_SESSION['u_id'] = $credential["id"];
                header('Location: display.php');
                
                // header('Location: display.php?id='.$credential["id"].'');
                exit;
            } 
            else {
               
                echo "<script> alert('⚠ Invalid Credentials!')
                window.location.replace('login.html');  
                </script>";
                exit;

                 
            } 

        }
    }

// }
?>

