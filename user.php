<?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $age = $_POST['age'];
    $phone = $_POST['Phone'];
    $gender = $_POST['Gender'];

    // THIS IS FOR TESTING PURPOSE.
    // echo '<b>Name: </b>'.$name.'<br>';
    // echo '<b>Email: </b>'.$email.'<br>';
    // echo '<b>Pass: </b>'.$pass.'<br>';
    // echo '<b>age: </b>'.$age.'<br>';
    // echo '<b>Phone: </b>'.$phone.' <br><br>';
    // echo '<b>Gender: </b>'.$gender.' <br><br>';
    // exit;

    // local database
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


    $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);
    if (!$conn) {
       echo "connection failed!";
    } else {
        // var_dump("iss", isset($_POST['update']));
        if (isset($_POST['update'])) {
            $id = $_POST['update_id'];
            $up_sql = "UPDATE $dbtable SET name='$name', email='$email', pass='$pass', age='$age', phone='$phone', gender='$gender' WHERE id='$id'";
            $update = $conn->query($up_sql);
            if ($update) {
                echo "<script> alert('✅ Data updated successfully!')
                      window.location.replace('display.php');  
                      </script>";
            }  else {
                // echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>⚠ Error occured while updating!</strong><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                //     </button>
                //      </div>';

                echo "data update failed!";
            }
        } elseif (isset($_POST['submit'])) {
            // Checking for duplicate data(gmail) 
            $dup = mysqli_query($conn, "SELECT * from $dbtable WHERE email='$email'");
            if(mysqli_num_rows($dup) > 0) {             
                echo "<script> alert('⚠Duplicate data found!')
                      window.location.replace('/');  
                </script>";

                    
            }else{
                $add_new_data= "INSERT INTO $dbtable (name, email, pass, age, phone, gender) 
                VALUES ('$name', '$email', '$pass', '$age', '$phone', '$gender')";

                if ($conn->query($add_new_data) == TRUE) {
                    echo "<script> alert('✅ Successfully data added! Please Login!')
                          window.location.replace('login.html');  
                    </script>";            
                } else {
                    echo "Data insertion failed!";
                }
            }    
        }
    }
 ?>   






















