<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SPACE BLOGS </title>
   <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- jQuery 1.11.1 (Compatible with countdown timer - DO NOT change order of scripts) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="style_sheet.css">
   <link rel="icon" type="image/jpg" sizes="16x16" href="images/logo.jpg">


  </head>

  <body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">BookMovie</a>
    </div>

    <ul class="nav navbar-nav navbar-right collapse navbar-collapse" id="myNavbar">
      <li><a href="user.php">Home</a></li>
      <li class="active"><a href="addmovie.php">Add Movie</a></li> 
      <li><a href="logout.php">LogOut</a></li> 
    </ul>
  </div>
</nav>
 </div>  
 <br>
 <br>
 <br>
 <br>
<div class='container'>

 <b> <p class="about" align="center">Welcome <?php echo $_SESSION['admin']; ?></p> </b>
</div>   
  <h2 align="center">Add Movie</h2>
             




    <div class="container">
    <div class="col-md-1"> </div>
     <div class="col-md-10">
  <form class="form-group" action="addmovie.php" method="post" enctype="multipart/form-data"> 
    <div class="form-group">
      <label >Movie Title:</label>
      <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
      <label >Movie Hero:</label>
      <input type="text" class="form-control" name="hero">
    </div>
    <div class="form-group">
      <label >Movie Heroine:</label>
      <input type="text" class="form-control" name="heroine">
    </div>
    <div class="form-group">
      <label >Movie Director:</label>
      <input type="text" class="form-control" name="director">
    </div>
    <div class="form-group">
      <label >Movie Description:</label>
      <textarea rows="10" class="form-control" name="desc"></textarea>
    </div>

    <div class="form-group">
      <label >Action:</label>
      <input type="text" class="form-control" name="action">
    </div>
  <div class="form-group">
    <label >Romance:</label>
    <input type="text" class="form-control" name="romance">
  </div>
  <div class="form-group">
    <label >Comedy:</label>
    <input type="text" class="form-control" name="comedy">
  </div>
  <div class="form-group">
    <label >Horror:</label>
    <input type="text" class="form-control" name="horror">
  </div>
  <div class="form-group">
    <label >SciFi:</label>
    <input type="text" class="form-control" name="scifi">
  </div>
  <div class="form-group">
    <label >Image:</label>
    <input type="file" class="form-control" name="image"/>
  </div>
    <button class="btn-primary " type="submit" name="submit">Submit</button> 
    </form>
    </div>
    <br> <br>
    <div class="col-md-1"> </div>
    </div>
  

<?php
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("BookMovie", $connection); // Selecting Database from Server
if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL


$tit = $_POST['title'];
$hero = $_POST['hero'];
$heroine = $_POST['heroine'];
$director = $_POST['director'];
$desc = $_POST['desc'];
$action = $_POST['action'];
$horror = $_POST['horror'];
$romance = $_POST['romance'];
$scifi = $_POST['scifi'];
$comedy = $_POST['comedy'];


$name= mysql_real_escape_string($_FILES['image']['name']);
$image= mysql_real_escape_string(file_get_contents($_FILES['image']['tmp_name']));

if($tit !=''||$hero !='' ||$director !=''){
//Insert Query of SQL
  
$query = mysql_query("insert into movieinfo(MovieName,MovieHero,MovieHeroine,MovieDirector,MovieDesc,M_Action,M_Comedy,
  M_Horror,M_Romance,M_SciFi,MoviePoster) values ('$tit', '$hero','$heroine', '$director' , '$desc' ,'$action','$comedy','$horror','$romance','$scifi','$image')");

$result = mysql_query("select * from movieinfo order by MovieId desc limit 1");
$row = mysql_fetch_assoc($result);
$movieid = $row['MovieId'];
mysql_query("INSERT INTO seatmap(MovieId) values($movieid)");

if (!$query)
  {
  echo("Error description: " . mysql_error());
  }
}
else{
echo "<br/><br/><br/><br/><br/><br/><br/><br/><p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
}
}
mysql_close($connection); // Closing Connection with Server

?>

    
    </body>

</html>
