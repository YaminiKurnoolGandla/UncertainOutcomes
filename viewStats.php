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
<center><h1><font color="black">Your weekly stats in comparison to other participants</font><h1></center>
	<form>
		<table>
      
            <tr>
                <td>Participant name</td>
                <td>WK1</td>
                <td>WK2</td>
				<td>WK3</td>
				<td>WK4</td>
				<td>WK5</td>
				<td>WK6</td>
				<td>WK7</td>
				<td>WK8</td>
				<td>WK9</td>
				<td>WK10</td>
				<td>WK11</td>
				<td>WK12</td>
				<td>WK13</td>
				<td>WK14</td>
				<td>WK15</td>
				<td>WK16</td>
				<td>WK17</td>
            </tr>
<?php
	require('db.php');
	$query = "SELECT * FROM selectedPlayers";
	$result = mysqli_query($dbconnect,$query);
	$rows = mysqli_num_rows($result);
	$userArray = array();
	if($rows>0){
		while ($row = mysqli_fetch_array($result)) {
			array_push($userArray, $row[0]);
		}
	}
	$uniqueUserArray = array();
	for ($i = 0; $i < count($userArray); $i++){
		if (!in_array ( $userArray[$i] , $uniqueUserArray )){
			array_push($uniqueUserArray, $userArray[$i]);
		}
	}
	$rankArray = array();
	foreach ($uniqueUserArray as $username){
		echo "<tr>";
		echo "<td>$username</td>";
		$query1 = "SELECT * FROM selectedPlayers where username='$username'";
		$result1 = mysqli_query($dbconnect,$query1);
		while ($row1 = mysqli_fetch_array($result1)) {
			array_push($rankArray, $row1[1]);
		}
		$week1Array = array();
			$week2Array = array();
			$week3Array = array();
			$week4Array = array();
			$week5Array = array();
			$week6Array = array();
			$week7Array = array();
			$week8Array = array();
			$week9Array = array();
			$week10Array = array();
			$week11Array = array();
			$week12Array = array();
			$week13Array = array();
			$week14Array = array();
			$week15Array = array();
			$week16Array = array();
			$week17Array = array();
		
		//echo count($rankArray);
		for($i = 0; $i < count($rankArray); $i++){
			
			$query2 = "SELECT a.week1, a.week2, a.week3, a.week4, a.week5, a.week6, a.week7, a.week8, a.week9, a.week10, a.week11, a.week12, a.week13, a.week14, a.week15, a.week16, a.week17 FROM stats a join selectedPlayers b on a.rank=b.rank where a.rank='$rankArray[$i]' and b.username = '$username'";
			$result2 = mysqli_query($dbconnect,$query2);
			$rows2 = mysqli_num_rows($result2);
			while ($row2 = mysqli_fetch_array($result2)) {
				array_push($week1Array, $row2[0]);
				array_push($week2Array, $row2[1]);
				array_push($week3Array, $row2[2]);
				array_push($week4Array, $row2[3]);
				array_push($week5Array, $row2[4]);
				array_push($week6Array, $row2[5]);
				array_push($week7Array, $row2[6]);
				array_push($week8Array, $row2[7]);
				array_push($week9Array, $row2[8]);
				array_push($week10Array, $row2[9]);
				array_push($week11Array, $row2[10]);
				array_push($week12Array, $row2[11]);
				array_push($week13Array, $row2[12]);
				array_push($week14Array, $row2[13]);
				array_push($week15Array, $row2[14]);
				array_push($week16Array, $row2[15]);
				array_push($week17Array, $row2[16]);
				
			}
		}
		echo "<td>".array_sum($week1Array)."</td>";
		echo "<td>".array_sum($week2Array)."</td>";
		echo "<td>".array_sum($week3Array)."</td>";
		echo "<td>".array_sum($week4Array)."</td>";
		echo "<td>".array_sum($week5Array)."</td>";
		echo "<td>".array_sum($week6Array)."</td>";
		echo "<td>".array_sum($week7Array)."</td>";
		echo "<td>".array_sum($week8Array)."</td>";
		echo "<td>".array_sum($week9Array)."</td>";
		echo "<td>".array_sum($week10Array)."</td>";
		echo "<td>".array_sum($week11Array)."</td>";
		echo "<td>".array_sum($week12Array)."</td>";
		echo "<td>".array_sum($week13Array)."</td>";
		echo "<td>".array_sum($week14Array)."</td>";
		echo "<td>".array_sum($week15Array)."</td>";
		echo "<td>".array_sum($week16Array)."</td>";
		echo "<td>".array_sum($week17Array)."</td>";
		$rankArray = array();
	}
	
?>
</table>
<div class="container signin">
	<p>To get back click here <a href="login.php">Sign in</a>.</p>
</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			