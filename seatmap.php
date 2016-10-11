<?php 
session_start();
if(!isset($_SESSION['id']))
{
  header('Location: login.php');
}
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <title> BOOK MOVIE </title>
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
    
   
    <script src="seat.js"></script>




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
      <a class="navbar-brand" href="#">Book Movie</a>
    </div>

    <ul class="nav navbar-nav navbar-right collapse navbar-collapse" id="myNavbar">
      <li class="active"><a href="user.php">Home</a></li>
        </ul>
  </div>
</nav>
<br>
 <br>
 <br>
 <br>
 <div class="container">
  </div>
 
  <br>
 <br>
 <br>
<?php
$movieid = $_GET['movieid'];
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("BookMovie", $connection); // Selecting Database from Server 
$result = mysql_query("SELECT * FROM movieinfo where MovieId=$movieid") or die('Unable to run query:');
$counter = mysql_num_rows($result);
if ($counter > 0) {
while ($row = mysql_fetch_array($result)) {
echo '<div class="col-md-3"> </div>
      <div class="col-md-6">  
 <div class="demo">
      <div id="seat-map">
      <p class="about"><div class="front">-----------------------------------------------<b>SCREEN HERE </b>-------------------------------------------</div>   </p>

      <br> <br> <br>
    </div>
    </div></div>
    <div class="col-md-3"> 
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="booking-details">
      <p class="about4">Movie: <span> '.$row['MovieName'].'</span></p>
      <p class="about4">Seat: </p>
      <ul id="selected-seats"></ul>
      <p class="about4">Tickets: <span id="counter">0</span></p>
      <p class="about4">Total: <b>$<span id="total">0</span></b></p>
          
      <button class="btn btn-info"  onclick="buyfun()">BUY</button>
          
   </div>' ;
   }

}

?>
   <script >
     var price = 100; //price
     var mp;
     var movieid= <?php echo $movieid; ?>;
    var $cart;
    var seats=[];

$(document).ready(function() {

  //var mp;
  
  myfun();    
  
    
});
//sum total money
function recalculateTotal(sc) {
  var total = 0;
  sc.find('selected').each(function () {
    total += price;
  });
     
  return total;
}

function replaceAt(string, index, replace) {
  return string.substring(0, index) + replace + string.substring(index + 1);
}

function myfun1(mp){
   $cart = $('#selected-seats'), //Sitting Area
  $counter = $('#counter'), //Votes
  $total = $('#total'); //Total money
  
  var sc = $('#seat-map').seatCharts({

    map: [  //Seating chart
        mp.substring(0,10),
        mp.substring(10,20),
        mp.substring(20,30),
        mp.substring(30,40),
        mp.substring(40,50),
        mp.substring(50,60),
        mp.substring(60,70),
        mp.substring(70,80),
        mp.substring(80,90),
        mp.substring(90,100)
        
    ],
    naming : {
      top : false,
      getLabel : function (character, row, column) {
        return column;
      }
    },
    legend : { //Definition legend
      node : $('#legend'),
      items : [
        [ 'a', 'available',   'Option' ],
        [ 's', 'unavailable', 'Sold']
      ]         
    },
    click: function () { //Click event
      if (this.status() == 'available') { //optional seat
        $('<li>R'+(this.settings.row+1)+' S'+this.settings.label+'</li>')
          .attr('id', 'cart-item-'+this.settings.id)
          .data('seatId', this.settings.id)
          .appendTo($cart);

          seats.push(this.settings.row*10+this.settings.label);
        $counter.text(sc.find('selected').length+1);
        $total.text(recalculateTotal(sc)+price);
              
        return 'selected';
      } else if (this.status() == 'selected') { //Checked
          //Update Number
          $counter.text(sc.find('selected').length-1);
          //update totalnum
          $total.text(recalculateTotal(sc)-price);
            
          //Delete reservation
          $('#cart-item-'+this.settings.id).remove();
          //optional

          var index =seats.indexOf(this.settings.row*10+this.settings.label);
          if (index > -1) {
              seats.splice(index, 1);
          }
          return 'available';
      } else if (this.status() == 'unavailable') { //sold
        return 'unavailable';
      } else {
        return this.style();
      }
    }
  });
  //sold seat
  sc.find('s.available').status('unavailable');

}
function myfun(){
    $.ajax({
    url: "getmap.php",
    type: "POST",
    data: {movieid: movieid},
    success: function(data){
      //mp=JSON.parse(data);
      //map=mp.Map;
      //window.alert(map);
      mp=data;
      myfun1(data);
      //window.alert(mp);

          },

  });  }

    function buyfun(){
      var nodes=$cart[0].childNodes
      var p=seats;
      var seatnumber="";
      for (var i = 0; i < nodes.length ; i++) {
        var q=(nodes[i]).innerHTML;
        seatnumber=seatnumber+","+q;
      }
      for(var i=0;i<p.length;i++){

        mp=replaceAt(mp,p[i]-1,"s");
        //alert(mp);
              }
              modifystr(mp,seatnumber);
      //alert(nodes[0];
        
    }

    function modifystr(s,seatnumber){
        $.ajax({
          url: "modifymap.php",
          type: "POST",
          data: {str: s, movieid: movieid,seatnumber: seatnumber},
          success: function(data){
      //mp=JSON.parse(data);
      //map=mp.Map;
      //window.alert(map);
          location.reload();
      //window.alert(mp);

          },

  }); 
    }
   </script> 
</body>

</html>
