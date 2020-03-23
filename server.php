<html>
<head> <title>Validate</title> </head>
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
<body >
 <?php
$con = mysqli_connect("localhost","root","");
if (!$con)
{
die('Could not connect:'  . mysqli_error($con));
}
mysqli_select_db($con,"Facultylp");
if($_POST["who"]=="faculty")
{
	
	$sql = "INSERT INTO Faculty(Name,Email,Pwd) VALUES ('$_POST[uname]','$_POST[email]','$_POST[psw]')";
	if (!mysqli_query($con,$sql))
		{
			die('Error: ' . mysqli_error($con));
		}
	echo "<br><h1 style=\"color:white\"><center>WELCOME<br>";
	echo "You have successfully registered";
    echo "<br>
	
	<a href=\"faculty.php?uname=$_POST[uname]\" style=\"color:white\" class=\"w3-button w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity w3-hover-opacity-off\">Click here</a>";	
}
else
{
	$sql = "INSERT INTO Student(Name,Email,Pwd) VALUES ('$_POST[uname]','$_POST[email]','$_POST[psw]')";
	if (!mysqli_query($con,$sql))
		{
			die('Error: ' . mysqli_error($con));
		}
		echo "<br><h1 style=\"color:white\"><center>WELCOME<br>";
     	echo "You have successfully registered";
        echo "<br>
	Let's get into home page and fill up your other details.<br><br>
	<a href=\"student.php?uname=$_POST[uname]\" style=\"color:white\" class=\"w3-button w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity w3-hover-opacity-off\">Click here</a>";	
}

mysqli_close($con)
?>

</body>
</html>