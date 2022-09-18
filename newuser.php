<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>register_form</title>
    <link rel="icon" type="image/x-icon" href="https://faberinfinite.com/wp-content/uploads/2017/11/favicon.png">
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>

</head>

<body class="bg-primary">

<style>
label#error_email {
position: absolute;
bottom: -27px;
font-size: 12px;
}

.toggle-password {
float: right;
cursor: pointer;
margin-right: 10px;
margin-top: -25px;
}

</style>

<?php
if ($_GET && $_GET['userId']) {

    // session_start(); 
    // if($_SESSION && $_SESSION['u_id']){

        //local database
        // $host = "localhost";
        // $dbUsername = "root";
        // $dbPassword = "";
        // $dbName = "ani_database";
        // $dbtable = "local_register";


        // online database 
        $host = "localhost";
        $dbUsername = "all_user";
        $dbPassword = "#123all@";
        $dbName = "aniruddha";
        $dbtable = "user";


        $id = $_GET['userId'];
        // $id = $_SESSION['u_id'];

        $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbName);

        $sql = "SELECT * FROM $dbtable WHERE id='$id'";
        $res = $conn->query($sql);
        $data = $res->fetch_assoc();
        // var_dump($data);
        // exit;

    } else {
      session_start();  
      $data = null;  
      $ferror = null;
      if (isset($_SESSION['error'])) {
        $ferror = $_SESSION['error'] ? $_SESSION['error'] : null;
      }
      session_destroy();  
    }
?>
    
    
<div class="container">
    <div class="row">
        <div class="col-md-7 m-auto">
            <div class="card p-4 mt-5">
                <form action="user.php" method="post" id="form">    

                     <h2 class="text-center pb-4"><?php echo $data ? 'Data Updation!':'Registration Form!'; ?></h2>

                     <div class="form-group">
                         <input type="text" placeholder="Name" id="name" class="form-control" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode==32)" required name="name" autocomplete="off" value="<?php echo $data ? $data['name'] : ''; ?>">
                     </div>

                     <div class="form-group">
                         <input type="email" placeholder="Email" id="email" class="form-control" required name="email" onkeydown="validation()" autocomplete="off" value="<?php echo $data ? $data['email'] : ''; ?>">
                         <span class="formerror" id="text"></span>
                     </div>
                     
                     <div class="form-group">
                          <input type="password" placeholder="Password" id="pass" class="form-control" required name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must input 1 uppercase, 1 lowercase,1 number and 1 special characters (min: 8)!" value="<?php echo $data ? $data['pass']: ''; ?>">
                          <i class="toggle-password fa fa-fw fa-eye-slash"></i>
                          <span id="password_msg"></span>
                     </div>  

                     <input type="hidden" name="update_id" value="<?php echo $id ? $id : null; ?>">

                     <div class="form-group">
                        <input type="password" id="confirm_pass" required name="confirm_pass" placeholder="Confirm Password" class="form-control" value="<?php echo $data ? $data['pass'] : ''; ?>">
                        <!-- <i class="toggle-password fa fa-fw fa-eye-slash"></i> -->
                        <span id="confirm_password_msg"></span>
                    </div>

                     <div class="form-group">
                          <input type="number" id="age" placeholder="Age" class="form-control" required name="age" max="120" min="10"  title="Age must be between 10 to 120!" value="<?php echo $data ? $data['age'] : ''; ?>">
                     </div>  

                     <div class="form-group">
                          <input type="phone" id="Phone" maxlength="10" placeholder="Phone" class="form-control" required name="Phone" pattern="[6789][0-9]{9}" oninvalid="this.setCustomValidity('Enter correct mobile number!')" oninput="this.setCustomValidity('')" value="<?php echo $data ? $data['phone'] : ''; ?>">
                     </div>  
                          
                     <div class="form-group">
                        <label for="Gender" required >Gender:</label>
                        <div class="col-md-9">
                          <input type="radio" name="Gender" required value="male">Male
                          <input type="radio" name="Gender" required value="female">Female
                        </div>
                     </div>

                    <?php if(!$data) { ?> 
                    <div class="py-3">
                        Already a member? <a href="login.html" class="text-primary"> Login</a>
                    </div> 
                    <?php } ?><br>                        


                     <div class="form-group row">
                        <?php if(!$data) { ?>
                        <div class="col-md-5 text-center">
                            <a href="/" class="btn btn-danger" >RESET</a>
                        </div>
                        <?php } ?>                        

                        <?php if($data) { ?>
                        <div class="col-md-5 text-center">
                            <a href="display.php" class="btn btn-danger" >CANCEL</a>
                        </div>
                        <?php } ?>                        

                        <div class="col-md-6 text-center">
                            <button type="submit" id="register" class="btn btn-success d-inline-block" name="<?php echo $data ? 'update':'submit'; ?>"><?php echo $data ? 'UPDATE':'REGISTER'; ?></button>
                        </div>
                     </div> 
                </form> 
                  
            </div>
        </div>
    </div>
</div>
   

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script>

// Matching Password and Confirm_Password
$(document).ready(function () {
      $("#confirm_pass").bind("keyup change", function () {
    passcheck($("#pass").val(), $("#confirm_pass").val());
    });
   })   


function passcheck(mypass, myconfirmpass){
    if(mypass!=myconfirmpass){
    $("#register").removeAttr("onclick");
    $("#confirm_password_msg").show();
    $("#confirm_password_msg").html('<div class="text-danger">Password did not matched!</div>');
    document.getElementById('register').disabled = true;
    }

    else {
    $("#register").removeAttr("onclick");
    $("#confirm_password_msg").show();
    $("#confirm_password_msg").html('');
    document.getElementById('register').disabled = false;
    }
}



// only number will allow, text not allowed in Phone.
$('input[name="Phone"]').keypress(function (event) {
  if (event.keyCode == 46 || event.keyCode == 8) {
    //do nothing
  } 
  else {
    if (event.keyCode < 48 || event.keyCode > 57) {
      event.preventDefault();
    }
  }
});




// Password pattern check on browser.
$(document).ready(function () {
  $("#pass").bind("keyup change", function () {
    check_Password($("#pass").val(), $("#confirm_pass").val());
  });
 
  $("#register").click(function () {
    check_Password($("#pass").val(), $("#confirm_pass").val());
  });
});

function check_Password(Pass, Con_Pass) {
    var re = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    if(!re.test(Pass)){
    $("#password_msg").show();
    $("#password_msg").html('<div class="text-danger">Must input 1 uppercase, 1 lowercase,1 number and 1 special characters (min: 8)!</div>');
    buttonControl()
    }

    else if(re.test(Pass)){
    $("#password_msg").show();
    $("#password_msg").html('');
    document.getElementById('register').disabled = false;
    }

}

// email validation
function validation() {
 
  let form = document.getElementById("form");
  let email = document.getElementById("email").value;
  let text = document.getElementById("text");
  let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

  if (!email.match(pattern) || email == "") {
    form.classList.add("valid");
    form.classList.remove("valid");
    form.classList.add("invalid");
    text.innerHTML = "Enter Valid Email";
    text.style.color = "#ff0000";
    buttonControl()

  } 
  else {
    text.innerHTML = "";
    document.getElementById('register').disabled = false;

  }

};


// Disable register button on error
function buttonControl() {
    const form = document.getElementById('form');
    document.getElementById('register').disabled = !form.checkValidity();
}


// Toggle Password 
$(".toggle-password").click(function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    input = $(this).parent().find("input");
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});
    
// Disable copy-paste.
$('body').bind('copy paste',function(e) {
    e.preventDefault(); return false; 
});

</script>

</body>
</html>

