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
$faculty = $_POST["Faculty"];
$hour = $_POST["Hour"];
$day = $_POST["Day"];
$who=$_GET["who"];
$name = $_GET["name"];
switch ($hour) {
    case "First Hour":
        $hour="Fh";
        break;
    case "Second Hour":
        $hour="Sh";
        break;
    case "Third Hour":
        $hour="Th";
        break;
    case "Fourth Hour":
        $hour="Foh";
        break;
    case "Fifth Hour":
        $hour="Fih";
        break;
    case "Sixth Hour":
        $hour="Sih";
        break;
    }
$sql ="CALL LookUp('$faculty','$hour','$day')";
$result=$con->query($sql);
$row = mysqli_fetch_array($result);
header( "refresh:3;url=$who.php?uname=$name" );
echo "<div class = \"w3-container\"><h1 class = \"w3-jumbo w3-center\"> $row[0] </h6></div>";
mysqli_close($con);
?>

</body>
</html>