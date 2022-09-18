<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Tutorial on PHP</title>
    <link rel="icon" type="image/x-icon" href="https://faberinfinite.com/wp-content/uploads/2017/11/favicon.png">
    
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="form.html">Php Tutorials</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
    <div class="container my-3">
            <?php 
            echo '<h1>Learning PHP</h1>';

            $First_number = 35;
			$Second_number = 20;
			echo "The sum of First_number and  Second_number is: ". $First_number+$Second_number. "<br>";
                 
			$name = "Ram";
			$age = 21;
			echo "The guy is $name and his age is $age<br><br>";
            
           	echo '<h2>Some notes</h2>';
			echo '<ul>';
			echo '<li>When we create a file in "htdocs" with the name "index.php", XAMPP will auto detect the php code in index file.';
			echo '<li>Also when we open this file in browser, "index.php" -- name will not be visible in url ("localhost/MPPS/").';  
			echo '<li>Other then the index all the other file name will be visible like : "localhost/MPPS/index1.php" --or-- "localhost/MPPS/[anyname_other_than_index.php]".';
			echo '</ul>';


            echo '<h2>Rules for creating variables in php</h2>';
			echo '<ul>';
			echo '<li>Starts with a $ sign.';
			echo '<li>Cannot start with a number.';
			echo '<li>Must start with a letter or an underscore character.';
			echo '<li>Can only contain alphanumeric characters and underscores.';
			echo '<li>Variables in php are Case sensitive. ($Lucifer, $lucifer and $LucifeR are different).';
			echo '</ul>';


            echo '<h2>Common Datatypes in PHP</h2>';
			echo '<ul>';
			echo '<li>String.';
			echo '<li>Intger.';
			echo '<li>Float.';
			echo '<li>Boolean.';
			echo '<li>Object.';
			echo '<li>Array.';
			echo '<li>NULL.';
			echo '</ul>';
			
			
			
            ?>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>







