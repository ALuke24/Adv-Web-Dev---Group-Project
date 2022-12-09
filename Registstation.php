<!doctype html>
<html>
<head>
<title>Registration</title>
<link rel="stylesheet" href="globalStyle.css">
<script>
    function checkfName(){
				var RegExp = /\w\w*/;
				var fnameInput = document.getElementById("firstName").value;
				var errorSpan = document.getElementById("fnameError");
				if(!RegExp.test(fnameInput)){
					errorSpan.innerHTML = "Error. Input incorrect.";
				}
				else{
					errorSpan.innerHTML = "";
				}
			}
      function checklName(){
				var RegExp = /[a-zA-z\-]+\s[a-zA-Z\-]+/;
				var lnameInput = document.getElementById("lastName").value;
				var errorSpan = document.getElementById("lnameError");
				if(!RegExp.test(lnameInput)){
					errorSpan.innerHTML = "Error. Input incorrect.";
				}
				else{
					errorSpan.innerHTML = "";
				}
			}
            function checkEmail(){
				var RegExp = /^([a-z\d\.-]+)@([a-z\d-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/;
				var emailInput = document.getElementById("email").value;
				var errorSpan = document.getElementById("emailError");
				if(!RegExp.test(emailInput)){
					errorSpan.innerHTML = "Error. Input incorrect.";
				}
				else{
					errorSpan.innerHTML = "";
				}
			}
            function checkUser(){
				var RegExp = /[a-zA-z\-]+\s[a-zA-Z\-]+/;
				var userInput = document.getElementById("user").value;
				var errorSpan = document.getElementById("userError");
				if(!RegExp.test(userInput)){
					errorSpan.innerHTML = "Error. Input incorrect.";
				}
				else{
					errorSpan.innerHTML = "";
				}
			}
            function checkPass(){
				var RegExp = /^[#\w@_-]{8,20}$/;
				var passInput = document.getElementById("pass").value;
				var errorSpan = document.getElementById("passError");
				if(!RegExp.test(passInput)){
					errorSpan.innerHTML = "Error. Input incorrect.";
				}
				else{
					errorSpan.innerHTML = "";
				}
			}
</script>
</head>
<body>
    <img class='logo'src="EdgewoodCollege.jpg" width="100px" height="100px">
	<h1 id="title">Registration</h1>
		<div id="navbar"> <!--Navigation bar-->
		<ul>
			<li><a href="main-page.html">Homepage</a></li>
			<li><a href="login.php">Login</a></li>
			<li><a href="Registstation.php">Registration</a></li>
			<li><a href="counseling-info.html">Counseling Info</a></li>
            <li><a href="staff-info.html">Staff</a></li>
            <li><a href="news.html">News</a></li>
		</ul>
	</div>
    <h2 >Already Registered?</h2> 
    <button class ='button button1'><a class='link'href="login.html">Login</a></button>
    <br>
    <div class="container">
        <label>First Name: </label><input type='text' id='firstName' name='firstName' onkeydown="checkfName()"><span class='error' id='fnameError'></span>
        <br>
        <label>Last Name: </label><input type='text' id='lastName' name='lastName' onkeydown="checklName()"><span class='error' id='lnameError'></span>
        <br>
        <label>Email: </label><input type='text' id='email' name='email' onkeydown="checkEmail()"><span class='error' id='emailError'></span>
        <br>
        <label>Username: </label><input type='text' id='user' name='user' onkeydown="checkUser()"><span class='error' id='userError'></span>
        <br>
        <label for="psw">Password</label><input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <label for="img">Select Profile Image:</label><input type="file" id="img" name="img" accept="image/*">
            </form>
          </div>
          
          <div id="message">
            <h3>Password must contain the following:</h3>
            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
            <p id="number" class="invalid">A <b>number</b></p>
            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
          </div>
                          
          <script>
          var myInput = document.getElementById("psw");
          var letter = document.getElementById("letter");
          var capital = document.getElementById("capital");
          var number = document.getElementById("number");
          var length = document.getElementById("length");
          
          // When the user clicks on the password field, show the message box
          myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
          }
          
          // When the user clicks outside of the password field, hide the message box
          myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
          }
          
          // When the user starts to type something inside the password field
          myInput.onkeyup = function() {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if(myInput.value.match(lowerCaseLetters)) {  
              letter.classList.remove("invalid");
              letter.classList.add("valid");
            } else {
              letter.classList.remove("valid");
              letter.classList.add("invalid");
            }
            
            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if(myInput.value.match(upperCaseLetters)) {  
              capital.classList.remove("invalid");
              capital.classList.add("valid");
            } else {
              capital.classList.remove("valid");
              capital.classList.add("invalid");
            }
          
            // Validate numbers
            var numbers = /[0-9]/g;
            if(myInput.value.match(numbers)) {  
              number.classList.remove("invalid");
              number.classList.add("valid");
            } else {
              number.classList.remove("valid");
              number.classList.add("invalid");
            }
            
            // Validate length
            if(myInput.value.length >= 8) {
              length.classList.remove("invalid");
              length.classList.add("valid");
            } else {
              length.classList.remove("valid");
              length.classList.add("invalid");
            }
          }
          </script>
        <input type="submit" id="submit"><br>        
    </form>
    <?php
    //connect to the db schema
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web_dev_gp";
    
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        else {
            echo "<p>Connected to the database successfully</p>";
        }
    
        $userID = isset($_POST['Username']) ? $_POST['Username'] : "";
        $password = isset($_POST['Email']) ? $_POST['Email'] : "";
        $fname = isset($_POST['FirstName']) ? $_POST['FirstName'] : "";
        $lname = isset($_POST['LastName']) ? $_POST['LastName'] : "";
        $usertype = isset($_POST['Password']) ? $_POST['Password'] : "";
    
        if(isset($_POST['Username']) && $Username != ""){
            
            //insert into Login table
            
            $sql = "INSERT INTO Login (`Username`, `Email`, `FirstName`, `LastName`, `Password`) VALUES ('$Username', '$Email', '$FirstName', '$LastName', '$Password')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>You have successfully created a new account!</p>";
            } 
            else {
                echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }


        }//end of isset if stmt
        
  $conn->close();
    
    
    
    ?> 
</body>
</html>
