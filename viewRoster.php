<?php
	session_start();
?>
<html>
    <head>
         <style>
	
  
            table {
				  border-collapse: collapse;
				  border-spacing: 0;
				  width: 100%;
				  border: 1px solid #ddd;
				}

				th, td {
				  text-align: left;
				  padding: 16px;
				}

				tr:nth-child(even) {
				  background-color: #f2f2f2;
				}
		</style>
	</head>
<body>
<center><h1><font color="black">Your Roster</font><h1></center>
	<form>
		<table>
      
            <tr>
                <td>Rank</td>
                <td>Player Name</td>
                <td>Team</td>
                <td>Position</td>
            </tr>
<?php
	require('db.php');
	$username = $_SESSION['username'];
	$rankArray = array();
	$query = "SELECT * FROM selectedPlayers where username='$username'";
	$result = mysqli_query($dbconnect,$query);
	$rows = mysqli_num_rows($result);
	if($rows>0){
		while ($row = mysqli_fetch_array($result)) {
			array_push($rankArray, $row[1]);
			
?>

<?php
		}  
		
	}
	

	else{
		echo "Please select players to form a team";
		
	}
	foreach ($rankArray as $rank){
			$query1 = "SELECT * FROM players where rank='$rank'";
			$result1 = mysqli_query($dbconnect,$query1);
			$rows1 = mysqli_num_rows($result1);
			if($rows1>0){
				while ($row = mysqli_fetch_array($result1)) {
?>
	<tr>
		<td><?php echo $row[1] ?></td>
        <td><?php echo $row[0] ?></td>
        <td><?php echo $row[2] ?></td>
        <td><?php echo $row[3] ?></td>
    </tr>
<?php
		}
	}
		}
?>
</table>
<div class="container signin">
	<p>To get back click here <a href="login.php">Sign in</a>.</p>
</div>
</body>
</html>