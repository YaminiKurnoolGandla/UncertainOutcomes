<!DOCTYPE html>
<html>
    <head>
        <style>
            select {
                appearance: none;
                outline: 0;
                background: #e7e7e7;
                background-image: none;
                width: 100%;
                height: 100%;
                color: black;
                cursor: pointer;
                border:1px solid black;
                border-radius:3px;
              
            }
            .select {
               

                position: relative;
                display: block;
                width: 4em;
                height: 2em;
                line-height: 3;
                overflow: hidden;
                border-radius: .25em;
                padding-bottom:10px;
                 
            }
            h1 {
                color:hot pink;
            }
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
 

 

.button1 {background-color: #e7e7e7} /* Gray */
        </style>
    </head>
    <body>
        <center>
        <h1>Select your Roster</h1>
        <form action="selectPlayers.php" method="post">
      
       
        <label for="QB">Quaterbacks:
        <div class="select">
        
          <select name="QB" id="QB">
           <option>0</option>        
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="4">5</option>
           <option value="4">6</option>
           <option value="4">7</option>
           <option value="4">8</option>
           <option value="4">9</option>
           <option value="4">10</option>
          </select>
        </div>
        <label for="RB">Runningbacks:</label>
        <div class="select">
        
          <select name="RB" id="RB">
           <option>0</option>        
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="4">5</option>
           <option value="4">6</option>
           <option value="4">7</option>
           <option value="4">8</option>
           <option value="4">9</option>
           <option value="4">10</option>
          </select>
        </div>   
        <label for="WR">Widereceivers</label>
        <div class="select">
        
          <select name="WR" id="WR">
           <option>0</option>        
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="4">5</option>
           <option value="4">6</option>
           <option value="4">7</option>
           <option value="4">8</option>
           <option value="4">9</option>
           <option value="4">10</option>
          </select>
        </div>
        <label for=="TE">Tightends:</label>
        <div class="select">
        
          <select name="TE" id="TE">
           <option>0</option>        
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="4">5</option>
           <option value="4">6</option>
           <option value="4">7</option>
           <option value="4">8</option>
           <option value="4">9</option>
           <option value="4">10</option>
          </select>
        </div>
        </center>
		<br><br>
		<div = "center">
		 <center><button class = "button button1">Submit</button></center>

    </body>
<div class="container signin">
	<p>To get back click here <a href="login.php">Sign in</a>.</p>
</div>
</html>