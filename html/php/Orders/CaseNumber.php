<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="../../../css/seaching.css?php echo time(); ?>" rel="stylesheet" type="text/css" />
<title>Order List </title>
<style>
.header {
  overflow: hidden;
  background-color: #f1f1f1;
  padding: 50px 50px;
  text-align: center;
  }
  body{
    margin: 0px;
    padding: 0px;
    text-align:center;
    width: 100%;
    background-color: #e6e6fae8;
    }
     
    input[type=number], input[type=number]{
    width:20%;
    padding:7px 10px;
    margin: 10px 0;
    display:inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    }
     
    button{
    background-color:#4CAF50;
    padding: 9px 5px;
    cursor:pointer;
    border:none;
    color:#ffffff;
    font-size: 15px;
    font-weight: bold;
    }
     
    button:hover{
    opacity:0.8;
    }
     
    #un,#ps{
    font-family:'Lato', sans-serif;
    color: gray;
    }
 
 
</style>
</head>
<body>
<div class="header"><img src="https://www.ritiriwaz.com/wp-content/uploads/2017/01/Indian-Emblem.jpg" alt="National Embelem" height="100px" width="100px" align="middle">
</div>  
    <div id="container">
<form action="" method="post" id="flogin">
 
<div class="border-box">
<h2>Orders by Case Number</h2>
<label for="Name" id="name">CASE TYPE:</label>
<select name="judge" id="cars">
            <option value="">The Chief justice</option>
            <option value="aastha">Mr. Justice Aastha</option>
            <option value="akash">Mr. Justice Aakash</option>
            <option value="anand">Mr. Justice Anand</option>
            <option value="arika">Mr. Justice Aarika</option>
        </select>
  <br><br>
 <label for="number" id="number"> CASE NO.: </label>
<input name="caseno" type="number"><br/>
<label for="number" id="number"> YEAR: </label>
<input name="year" type="number"><br/>

<button name= "search" type="submit" value="Search"  id="search" onClick="alert('YOU GOT YOUR DESIRED RESULT')">Search</button>
</div>
 
</form>
</div>
</body>
</html>
<br><br>


<?php
$connection = mysqli_connect("localhost:3307", "root", "");
$db = mysqli_select_db($connection, "testing");
if(isset($_POST['search'])){
    $id1 = $_POST['judge'];
    $id2 = $_POST['caseno'];
    $id3 = $_POST['year'];
    $query = "SELECT * FROM orders where JUDGENAME = '$id1' AND CASENO = '$id2' AND YEARREG = '$id3'";
    $query_run = mysqli_query($connection,$query);
    ?>
        <?php
    
    while($row = mysqli_fetch_array($query_run)){
                ?>
        <div class="container" style="width: 80%;">
        <table>
            <tr>
                <th>case number</th>
                <th><?php echo $row['CASENO'] ?></th>
            </tr>
            <tr>
                <th>judge name</th>
                <th><?php echo $row['JUDGENAME'] ?></th>
            </tr>
            <tr>
                <th>case type</th>
                <th><?php echo $row['CASETYPE'] ?></th>
            </tr>
            <tr>
                <th>year</th>
                <th><?php echo $row['YEARREG'] ?></th>
            </tr>
            <tr>
                <th>petitioner name</th>
                <th><?php echo $row['PETNAME'] ?></th>
            </tr>
            <tr>
                <th>pet advocate</th>
                <th><?php echo $row['PETADV'] ?></th>
            </tr>
            <tr>
                <th>advocate aor</th>
                <th><?php echo $row['PETAOR'] ?></th>
            </tr>
            <tr>
                <th>order date</th>
                <th><?php echo $row['ORDERDATE'] ?></th>
            </tr>
            <tr>
                <th>order pdf</th>
                <th><a href="<?php echo $row['PDF'] ?>">pdf</a></th>
            </tr>
            <br>
            
        </table>
        </div>
        <?php
             
    }
}


?>