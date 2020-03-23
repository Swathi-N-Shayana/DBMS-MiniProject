<html>
<style>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link rel="stylesheet" href="googlefont.css">
<link rel="stylesheet" href="fontawesome.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
body, html {
    height: 100%;
    line-height: 1.8;
}
/* Full height image header */
.bgimg-1 {
    background-position: center;
    background-size: cover;
    background-image: url("home.jpg");
    min-height: 100%;
}
.w3-bar .w3-button {
    padding: 20px;
}
body{
	margin:0;
	padding:0;
	background:url(Home.jpg);
	background-size: cover;
	font-family: sans-serif;
}

button {
    background-color: white;
    color: black;
    padding: 14px 20px;
    margin: 0px 0;
    border: none;
    cursor: pointer;
	
    
}

button:hover {
    opacity: 0.8;
}
</style>
<body>
<?php
session_start();
$con = mysqli_connect('localhost', 'root','');
// Grab User submitted information
$uname = $_POST["uname"];
$pass = $_POST["pwd"];
$who  = $_POST["who"];
// Make sure we connected successfully
if(! $con)
{
    die('Connection Failed'.mysql_error());
}
mysqli_select_db($con,"Facultylp");
// Select the database to use
if($who == 'faculty' || $who == 'student')
	$query = "SELECT * FROM $who WHERE Name='$uname' AND Pwd='$pass'";
else
	$query = "SELECT * FROM $who WHERE Uname='$uname' AND Pwd='$pass'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

 if($row["Name"]==$uname && $row["Pwd"]==$pass && $who == "faculty")
    header("Location: faculty.php?uname=$uname");
else	if($row["Name"]==$uname && $row["Pwd"]==$pass && $who == "student")
           header("Location: student.php?uname=$uname");
	    else if($row["Uname"]==$uname && $row["Pwd"]==$pass && $who == "admin")
				header("Location: admin.php?uname=$uname");	
			 else
				echo"<h1 style='color:white'>Sorry, your credentials are not valid, Please try again.</h1>";
?>
</body>
</html>