<?php
	session_start();
    $con = mysqli_connect("localhost","root","","facultylp");
if (!$con)
{
die('Could not connect:'  . mysqli_error($con));
}
mysqli_select_db($con,"facultylp");
$id = $_GET["id"];
?>
<html>
<title><?php echo "$id TimeTable" ?></title>
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
</style>
<?php
$sql="SELECT * FROM facultylp.classtt WHERE Class = '$id' ORDER BY id";
$result=mysqli_query($con,$sql);
?>
<div class="w3-top">
<h1 class="w3-color-white w3-center"> Section <?php echo "$id"?></h1>
</div>
<div class= "w3-container bgimg-1" >
<br><br><br><br><table class="w3-table-all w3-hoverable w3-opacity">
    <thead>
      <tr class="w3-light-grey">
        <th>Day</th>
        <th>First Hour</th>
        <th>Second Hour</th>
        <th>Third Hour</th>
        <th>Fourth Hour</th>
        <th>Fifth Hour</th>
        <th>Sixth Hour</th>  
      </tr>
    </thead>
    <?php while($row = mysqli_fetch_array($result))
			{
			echo "<tr class=\"w3=light-grey\"> <td>" . $row['Day'] . "</td>";
			echo "<td>" . $row['Fh'] . "</td>";
			echo "<td>" . $row['Sh'] . "</td>";
			echo "<td>" . $row['Th'] . "</td>";
			echo "<td>" . $row['Foh'] . "</td>";
			echo "<td>" . $row['Fih'] . "</td>";
			echo "<td>" . $row['Sih'] . "</td>";
			echo "</tr>";
			};
	?>		
</table>
</div>
</html>
<?php 
mysqli_close($con);
?>