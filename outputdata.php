<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo-Form</title>
    <link rel="icon" type="image/x-icon" href="https://faberinfinite.com/wp-content/uploads/2017/11/favicon.png">
   
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >


</head>
<body>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $Phone = $_POST['Phone'];
        $Weight = $_POST['Weight'];

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your data has been submitted successfully!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>';
      
    }
?>

    <div class="container">
        <div class="row">
            <div class="col-md-7 m-auto">
                <div class="card p-4 mt-5">
                         <h2 class="text-center pb-4">This Is Your Data!</h2>
                            

                         <div class="form-group row">
                            <div class="col-md-9">
                             <?php 
                                echo '<b>Name: </b>'.$fname.' '.$lname.''
                              ?>

                            </div>
                         </div>
                         
                         <div class="form-group row">
                            <div class="col-md-9">
                             <?php 
                                echo '<b>Age: </b>'.$age.''
                              ?>
                            </div>
                         </div>  

                         <div class="form-group row">
                             <div class="col-md-9">
                             <?php 
                                echo '<b>Phone: </b>'.$Phone.''
                              ?>
                             </div>
                         </div>  

                         <div class="form-group row">
                            <div class="col-md-9">
                             <?php 
                                echo '<b>Weight: </b>'.$Weight.' '
                              ?>
                            </div>
                         </div>  

                            <a href="/">Home</a>
                            <a href="/index.php">Visit my php page</a>

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