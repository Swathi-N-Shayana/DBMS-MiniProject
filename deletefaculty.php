<html>
<head> <title>Delete faculty</title> </head>
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
$name = $_POST["name"];
$sql1 = "SELECT * FROM faculty WHERE Name = '$name'";
$result = mysqli_query($con,$sql1);
$a = mysqli_fetch_array($result);
if($a[0] != $name)
{
	header( "refresh:3;url=admin.php" );
	echo "<br><h1 style=\"color:white\"><center>RECORD NOT FOUND.<br>";	
}
else
{
	$sql = "DELETE FROM Faculty WHERE Name = '$name'";
	if (!mysqli_query($con,$sql))
		{
			die('Error: ' . mysqli_error($con));
		}
		header( "refresh:3;url=admin.php" );
	echo "<br><h1 style=\"color:white\"><center>DELETED<br>";
}
mysqli_close($con)
?>

</body>
</html>