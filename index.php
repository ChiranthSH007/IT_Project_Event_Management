<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,700,900');
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/home_page.css">
</head>
<body>
<?php
 session_start();
 include("config.php");
 if(!isset($_SESSION["login"]))
 {
	$login_stats="Login";
    $page_slct="login_reg_page.php";
 }
else{
    $login_stats="Logout";
    $page_slct="logout_process.php";
}
    ?>
    <div class="header">
        <nav>
            <h1>Event Management</h1>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="#event-div">Events</a></li>
                <li><a href="">About</a></li>
                <li><button type="submit" class="lgin btn"><a href=<?php echo $page_slct; ?>><?php echo"<p>$login_stats</p>";?></a></button></li>
            </ul>
        </nav>

        <div class="header-text">
            <p></p>
        </div>
    </div>
<div id="event-div">
<p class="eventtitle">All Events</p>
    <div class="container-event">
        
        <div class="event-list">

<?php
   
  $event_query = "SELECT * FROM events";
  $run_query1 = mysqli_query($conn,$event_query);
  
  if(mysqli_num_rows($run_query1) > 0){
    while($row = mysqli_fetch_array($run_query1)){
        // $event_id=$row['event_id'];
        // $event_name=$row['event_name'];
        // $event_details=$row['event_details'];
        // $event_date=$row['event_date'];
        // $event_price=$row['event_price'];
      // session_register('eventname');
       $_SESSION['eventname']=htmlentities($row['event_name']);
?>
     <div class='event-tile'>
     <div class='event-name'>
     </div>
     <h3 name='uname'><?php echo htmlentities($row['event_name']);?></h3>
     <img src='https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxleHBsb3JlLWZlZWR8Mnx8fGVufDB8fHx8&w=1000&q=80' >
     <div class='layer'>
         <p><?php echo htmlentities($row['event_details']);?></p>
         <p><?php echo htmlentities($row['event_price']);?></p>
         <p><?php echo htmlentities($row['event_date']);?></p>
         <a href='event_page.php?eventid=<?php echo htmlentities($row['event_id'])?>'><i class='bi bi-link-45deg'>Regiter</i></a>
     </div>
 </div>
<?php
  }
}

  
// <!-- //   $sql = 'SELECT * from events';
// //   mysqli_select_db('event_mgt');
// //   $retval = mysqli_query( $conn, $sql,);
  
// //   if(! $retval ) {
// //      die('Could not get data: ' . mysqli_error());
// //   }
  
// //   while($row = mysqli_fetch_array($retval, MYSQL_ASSOC)) {
// //      echo "EMP ID :{$row['event_id']}  <br> ".
// //         "EMP NAME : {$row['event_name']} <br> ".
// //         "EMP SALARY : {$row['event_details']} <br> ".
// //         "--------------------------------<br>";
// //   }
  
// //   echo "Fetched data successfully\n";
  

?> 
            </div>
        </div>
        <a href="" class="btn">See more</a>    
    </div>
</div>

    <div id="contact">
    <div class="container">
        <div class="row">
            <div class="contact-left">
                <h1 class="sub-title">Contact Me</h1>
                <p><i class="bi bi-envelope-fill"></i> chiranthsh007@gmail.com</p>
                <p><i class="bi bi-telephone-fill"></i> 9108912983</p>
                <div class="social-icons">
                    <a href="https://github.com/ChiranthSH007"><i class="bi bi-github"></i></a>
                    <a href="https://www.instagram.com/chiranthsh/"><i class="bi bi-instagram"></i></a>
                    <a href="https://www.linkedin.com/in/chiranthsh/"><i class="bi bi-linkedin"></i></a>
                    <a href="https://twitter.com/shchiranth"><i class="bi bi-twitter"></i></a>
                </div>
                <a href="" download class="btn btn2">Download CV</a>
            </div>
            <div class="contact-right">
                <form name="submit-to-google-sheet">
                    <input type="text" name="Name" placeholder="Your Name" required>
                    <input type="email" name="Email" placeholder="Your Email" required>
                    <textarea name="Message"  rows="6" placeholder="Your Message"></textarea>
                    <button type="submit" class="btn btn2">Submit</button>
                </form>
                <span id="msg"></span>
            </div>
        </div>
    </div>
</body>
</html>