<?php
session_start();
$con = mysqli_connect('localhost', 'root','');
// Grab User submitted information
$name = $_GET["name"];
$who = $_GET["who"];
// Make sure we connected successfully
if(! $con)
{
    die('Connection Failed'.mysql_error());
}
mysqli_select_db($con,"Facultylp");
// Select the database to use?>

<html>
<title>Update <?php echo "$name" ?></title>
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
.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}
.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}

.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
<body>

<!-- Navbar (sit on top) -->
<div class="w3-top bgimg-1">

<?php	
$query1 = "SELECT * FROM faculty WHERE Name='$name'";
$query2 = "SELECT * FROM student WHERE Name='$name'";
$result1 = mysqli_query($con, $query1);
$result2 = mysqli_query($con, $query2);
$row1 = mysqli_fetch_array($result1);
$row2 = mysqli_fetch_array($result2);
 if($row1["Name"]== $name)
 {?>
  <div class = "w3-container w3-left w3-padding">
	<h1> Update the following details of the faculty <?php echo "$name"?></h1>
	<form class="w3-round-large" method=POST action="updatefacultyadmin.php?uname=faculty&who=<?php echo "$who"?>">
		<input id="myInput" type="text" name="Name" placeholder="Faculty Name" value = "<?php echo $row1["Name"]?>" class="w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity">
		<br>
		<input id="myInput" type="text" name="Id" placeholder="Id" value = "<?php echo $row1["Id"]?>" class="w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity" >
		<br>
		<input id="myInput" type="text" name="Phno" placeholder="Phone number" value = "<?php echo $row1["Phno"]?>" class="w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity" >
		<br>
		<input id="myInput" type="text" name="Email" placeholder="Email" value = "<?php echo $row1["Email"]?>" class="w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity" >
		<br>
		<input id="myInput" type="text" name="Sex" placeholder="Sex" value = "<?php echo $row1["Sex"]?>" class="w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity" >
		<br>
		<input id="myInput" type="password" name="Pwd" placeholder="Password" value = "<?php echo $row1["Pwd"]?>" class="w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity" >
		<br>
		<input type="submit" name="Update" placeholder="Update Faculty" value="Update Faculty" class="w3-button w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity w3-hover-opacity-off">
	</form>
	</div>
 <?php }
		else if ($row2["Name"] == $name)
		{?>
			<div class = "w3-container w3-left w3-padding">
	<h1> Update the following details of the Student <?php echo "$name"?></h1>
	<form class="w3-round-large" method=POST action="updatestudentadmin.php?uname=student&who=<?php echo "$who"?>">
		<input id="myInput" type="text" name="Name" placeholder="Student Name" value = "<?php echo $row2["Name"]?>" class="w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity" >
		<br>
		<input id="myInput" type="text" name="USN" placeholder="USN" value = "<?php echo $row2["USN"]?>" class="w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity" >
		<br>
		<input id="myInput" type="text" name="Class" placeholder="Class" value = "<?php echo $row2["Class"]?>" class="w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity" >
		<br>
		<input id="myInput" type="text" name="Phno" placeholder="Phone number" value = "<?php echo $row2["Phno"]?>" class="w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity" >
		<br>
		<input id="myInput" type="text" name="Email" placeholder="Email" value = "<?php echo $row2["Email"]?>" class="w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity" >
		<br>
		<input id="myInput" type="text" name="Sex" placeholder="Sex" value = "<?php echo $row2["Sex"]?>" class="w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity" >
		<br>
		<input id="myInput" type="password" name="Pwd" placeholder="Password" value = "<?php echo $row2["Pwd"]?>" class="w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity" >
		<br>
		<input type="submit" name="Update" placeholder="Update Student" value="Update Student" class="w3-button w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity w3-hover-opacity-off">
	</form>
	</div>
		<?php }
				else
				{
				?><h1> The user doesn't exist. Please try again.</h1><?php }?>
</div>
</body>
</html>