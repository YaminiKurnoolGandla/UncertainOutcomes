<?php
	session_start();
	echo "Hello";
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
				/* Style the tab */

				
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
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">London</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
</div>
<div id="London" class="tabcontent">
  <h3>London</h3>
  <?php

	$username = $_SESSION['username'];

	if(isset($_POST['search']))
	{
		$valueToSearch = $_POST['valueToSearch'];
		$query = "SELECT * FROM players WHERE playername LIKE '%".$valueToSearch."%' and position = 'QB'";
		$search_resultQB = filterTable($query);
		
	}
	 else {
		$queryQB = "SELECT * FROM players where position = 'QB'";
		$search_result = filterTable($queryQB);
		fetchResult($search_resultQB);
	}
	

?>
</div>


	
<center><h1><font color="black">Select your players</font><h1></center>




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
		function filterTable($query)
	{
		require('db.php');
		$result = mysqli_query($dbconnect,$query);
		return $result;
	}
		function fetchResult($search_result){
		while ($row = mysqli_fetch_array($search_result)) {
			echo "<tr>";
			echo "<td><input type='checkbox' name='checkbox[]' value='".$row['rank']."'></td>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[0]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "</tr>";

		}
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
  var tableId, rows, sw, i, x, y, shouldChange;
  tableId = document.getElementById("playersList");
  sw = true;
  while (sw) {
    sw = false;
    rows = tableId.rows;
    for (i = 1; i < (rows.length - 1); i++) {
      shouldChange = false;
      x = rows[i].getElementsByTagName("TD")[1];
      y = rows[i + 1].getElementsByTagName("TD")[1];
      if (Number(x.innerHTML) > Number(y.innerHTML)) {
        shouldChange = true;
        break;
      }
    }
    if (shouldChange) {
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      sw = true;
    }
  }
}
</script>
<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

		<center><input type = "submit" name = "select" value = "Select Players">