<?php
	session_start();
    $con = mysqli_connect("localhost","root","","facultylp");
if (!$con)
{
die('Could not connect:'  . mysqli_error($con));
}
mysqli_select_db($con,"facultylp");
$studentname = $_GET["uname"];
?>
<html>
<title><?php echo "$studentname" ?></title>
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
  <div class="w3-bar w3-white w3-card" id="myNavbar">
    <a href="#home" class="w3-bar-item w3-button w3-wide">Hello <?php echo "$studentname" ?></a>
    <!-- Right-sided navbar links -->
    <div class="w3-hide-small">
      <div class="w3-dropdown-hover">
      <button class="w3-button">SECTIONS</button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="displaytt.php?id=3a" class="w3-bar-item w3-button" target="_blank">3A</a>
        <a href="displaytt.php?id=3b" class="w3-bar-item w3-button" target="_blank">3B</a>
        <a href="displaytt.php?id=3c" class="w3-bar-item w3-button" target="_blank">3C</a>
		<a href="displaytt.php?id=5a" class="w3-bar-item w3-button" target="_blank">5A</a>
		<a href="displaytt.php?id=5b" class="w3-bar-item w3-button" target="_blank">5B</a>
		<a href="displaytt.php?id=7a" class="w3-bar-item w3-button" target="_blank">7A</a>
		<a href="displaytt.php?id=7b" class="w3-bar-item w3-button" target="_blank">7B</a>
      </div>
    </div>
   </div>
   <a href="updatedetails.php?name=<?php echo "$studentname"?>&who=student" class="w3-bar-item w3-button" >MODIFY</a>
   <div class="w3-right w3-hide-small">
      <a href="Home.html" class="w3-bar-item w3-button">LOGOUT </a>
    </div>
</div>
<div class = "w3-container w3-middle w3-padding">
	<h1> Search for Faculty Here!</h1>
	<form autocomplete="off" class="w3-round-large" method=POST action="lookup.php?who=student&name=<?php echo "$studentname" ?>">
		<div class="autocomplete">
			<input id="myInput" type="text" name="Faculty" placeholder="Faculty Name"  class="w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity" ></div>
		<br>
		<div class="autocomplete">
			<input id="myInput1" type="text" name="Day" placeholder="Day"  class="w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity" ></div>
		<br>
		<div class="autocomplete">
			<input id="myInput2" type="text" name="Hour" placeholder="Hour"  class="w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity" >
		</div>
		<br>
		<input type="submit" name="LookUp" placeholder="LookUp" value="Lookup" class="w3-button w3-round-large w3-white w3-padding w3-large w3-margin-top w3-opacity w3-hover-opacity-off">
	</form>
	</div>
</div>
</body>
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var fnames = ["Aarabhi",
"Anandkumar",
"Archan",            
"Bharath",           
"Bhavya",          
"Deepu",         
"Ganesh ",        
"Harsha",       
"Hemanth",      
"Honnaraju",     
"Kavya",    
"Kruthika",   
"Murali",  
"Nandakumar", 
"Prasanna",
"Ranjith",              
"Santhosh",
"Shobha",
"Shruthi",
"Srilalitha",
"Suhas",
"Sumathi",
"Summaya",
"Sushma"];

var Days = ["Monday","Tuesday","Wednesday","Thursday","Friday"];
var Hours=["First Hour","Second Hour","Third Hour","Fourth Hour","Fifth Hour","Sixth Hour"];
/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), fnames);
autocomplete(document.getElementById("myInput1"), Days);
autocomplete(document.getElementById("myInput2"), Hours);
</script>

</html>