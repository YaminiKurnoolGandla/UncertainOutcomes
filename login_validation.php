<!Doctype html>
<html>
<style>
.button {
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

 

.center {
  margin: 0;
  position: absolute;
  top: 125%;
  left: 50%;
  -ms-transform: translate(-50%, -20%);
  transform: translate(-50%, -20%);
}
.center1 {
  margin: 0;
  position: absolute;
  top: 2%;
  left: 50%;
  -ms-transform: translate(-50%, -20%);
  transform: translate(-50%, -20%);
}
 

 

.button1 {background-color: #e7e7e7} /* Green */
</style>
<?php
    session_start();
    
?>
<html>
<body>
<?php
    $_SESSION['username'] = $_POST["username"];
    require('db.php');
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM participants where username='$username' and password='$password'";
    $result = mysqli_query($dbconnect,$query);
    $rows = mysqli_num_rows($result);
    if($rows>0){
        while ($row = mysqli_fetch_array($result)) {
			echo "<br><br><br><br><br>";
			echo "<div class='center1'>";
            echo "<h1 align=center> Find your details below:";
            echo "<h2 align=center> User name : $row[0]";
            echo "<h2 align=center>Email : $row[2]";
        }
    }
    else{
        echo "Invalid user name and password";
    }
?>
<div class="center">
<form action="createRoster.php">
    <button class = "button button1">Create Roaster</button>
</form>
<form action="viewRoster.php">
    <button class = "button button1">View Roaster</button>
</form>
<form action="updateRoster.php">
    <button class = "button button1">Change Roaster</button>
</form>
<form action="viewStats.php">
    <button class = "button button1">View Stats</button>
</form>
</div>
</div>
<br><br><br><br><br>
<br><br><br><br><br><br>
<br><br><br><br><br>
<br>
<br>
<br>
<div class="container signin">
	<p>To get back click here <a href="login.php">Sign in</a>.</p>
</div>
</body>

</html>