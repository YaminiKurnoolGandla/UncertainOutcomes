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
				#input {
					  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
					  background-position: 10px 12px; /* Position the search icon */
					  background-repeat: no-repeat; /* Do not repeat the icon image */
					  width: 100%; /* Full-width */
					  font-size: 16px; /* Increase font-size */
					  padding: 12px 20px 12px 40px; /* Add some padding */
					  border: 1px solid #ddd; /* Add a grey border */
					  margin-bottom: 12px; /* Add some space below the input */
				}
				
		</style>
	</head>
<body>	
<?php

	require('db.php');
	$username = $_SESSION['username'];
	$QB = $_POST["QB"];
	$RB = $_POST["RB"];
	$WR = $_POST["WR"];
	$TE = $_POST["TE"];
?>

<?php

	$username = $_SESSION['username'];

	if(isset($_POST['search']))
	{
		$valueToSearch = $_POST['valueToSearch'];
		$query = "SELECT * FROM players WHERE playername LIKE '%".$valueToSearch."%'";
		$search_result = filterTable($query);
		
	}
	 else {
		$query = "SELECT * FROM players";
		$search_result = filterTable($query);
	}
	function filterTable($query)
	{
		require('db.php');
		$result = mysqli_query($dbconnect,$query);
		return $result;
	}

?>

	
<center><h1><font color="black">Select your Team</font><h1></center>
<center><h2><font color="black">Please select <?php echo $QB; ?> QB, <?php echo $RB; ?> RB, <?php echo $WR; ?> WR, <?php echo $TE; ?> TE</font><h2></center>
	<form action="selectedPlayers.php" method="post">
	<input type="text" id="input" onkeyup="searchFunction()" placeholder="Search for Player names here..">
		<table id="playersList">
			<tr>
				<th onclick="sorting(0)">Select</th>
                <th onclick="numberSort()">Rank</th>
                <th onclick="sorting(2)">Player Name</th>
                <th onclick="sorting(3)">Team</th>
                <th onclick="sorting(4)">Position</th>
            </tr>
<?php
		while ($row = mysqli_fetch_array($search_result)) {
			echo "<tr>";
			echo "<td><input type='checkbox' name='checkbox[]' value='".$row['rank']."'></td>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[0]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "</tr>";

		}
?>
		</table>
		<script>
		function searchFunction() {
		  var searchInput, searchFilter, table, tr, td, i, searchValue;
		  searchInput = document.getElementById("input");
		  searchFilter = searchInput.value.toUpperCase();
		  table = document.getElementById("playersList");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[2];
			if (td) {
			  searchValue = td.textContent || td.innerText;
			  if (searchValue.toUpperCase().indexOf(searchFilter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			}       
		  }
		}
		</script>
		<script>
function sorting(n) {
  var tableId, rows, s, i, x, y, shouldChnage, direction, count = 0;
  tableId = document.getElementById("playersList");
  s = true;
  direction = "asc"; 
  while (s) {
    s = false;
    rows = tableId.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldChange = false;
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      if (direction == "desc") {
		if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          shouldChange = true;
          break;
        }
      } else if (direction == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          shouldChange= true;
          break;
        }
      }
    }
    if (shouldChange) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      s = true;
      count ++;      
    } else {
      if (count == 0 && direction == "asc") {
        direction = "desc";
        s = true;
      }
    }
  }
}
</script>
<script>
function numberSort() {
  var tableId, rows, sw, i, x, y, shouldSwitch;
  tableId = document.getElementById("playersList");
  sw = true;
  while (sw) {
    sw = false;
    rows = tableId.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];
      if (Number(x.innerHTML) > Number(y.innerHTML)) {
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      sw = true;
    }
  }
}
</script>

		<center><input type = "submit" name = "select" value = "Select Players"></center>
		<div class="container signin">
	<p>To get back click here <a href="login.php">Sign in</a>.</p>
</div>