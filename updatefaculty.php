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
<body >
 <?php
$con = mysqli_connect("localhost","root","");
if (!$con)
{
die('Could not connect:'  . mysqli_error($con));
}
mysqli_select_db($con,"Facultylp");
$who= $_GET["who"];
$Name = $_POST["Name"];
$Nametemp = $Name;
$Id = $_POST["Id"];
$Idtemp = $Id;
$Phno =$_POST["Phno"];
$Email = $_POST["Email"];
$Sex = $_POST["Sex"];
$Pwd = $_POST["Pwd"];
	$sql = "UPDATE faculty
			SET Name = '$Name', Id = '$Id', Phno = '$Phno', Email = '$Email', Sex = '$Sex', Pwd = '$Pwd'
			WHERE Name = '$Nametemp';";
	if (!mysqli_query($con,$sql))
		{
			die('Error: ' . mysqli_error($con));
		}
	header( "refresh:3;url=$who.php?uname=$Name" );
	echo "<br><h1 style=\"color:white\"><center>Updated<br>";
    echo "<br>";
mysqli_close($con);
?>

</body>
</html>