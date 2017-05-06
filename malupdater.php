<html>
<head>
<title>
MyAnimeList PHP Updater v1.2 - Generic Updater Script by Injabie3
</title>
</head>
<body>
<b>MyAnimeList PHP Updater v1.2 - Generic Updater Script by Injabie3</b>
<br />
<br />
Usage: Use MalUpdater to send updates to this page.<br />
Last Modified: 2016-12-27 - Migrated from mysql to mysqli.
Last Modified: 2017-02-05 - Fixed "" around mal index.
<br />
<br />
<b>Status (Main):</b>
<?php

//Configure the following for your database.
$host="localhost"; // Host name 
$username="USERNAME"; // Mysql username 
$password="PASSWORD"; // Mysql password 
$db_name="DATABASE"; // Database name 
$tbl_name="TABLE"; // Table name 
$usercode="USERCODE"; // User code, to prevent unauthorized updates.

// Connect to server and select database.
$con = new mysqli("$host", "$username", "$password")or die("Cannot connect (Main)"); 
$con->select_db("$db_name")or die(mysqli_error());
$con->query("SET NAMES 'utf8'");

// Get data from MAL Updater 
$user=$_POST['user'];
$animeID=$_POST['animeID'];
$name=$_POST['name'];
$ep=$_POST['ep'];
$eptotal=$_POST['eptotal'];
$picurl=$_POST['picurl'];
$code=$_GET['code'];


// Insert data into mysql
$data_mal=$con->query("SELECT * FROM  `$tbl_name` ORDER BY  `timestamp` DESC LIMIT 0 , 1") or die(mysqli_error());
while($info_mal = $data_mal->fetch_array())
{
	if (isset($_GET['mal']) && $_GET['mal'] == "test")
	{	
		$sql="INSERT INTO $tbl_name (`ID` ,`timestamp` ,`user` ,`animeID` ,`name` ,`ep` ,`eptotal` ,`picurl`) VALUES (NULL ,CURRENT_TIMESTAMP ,'Test', '0', 'Database Test', '0', '0', '');";
		$result = $con->query($sql);
		// if successfully insert data into database, displays message "Successful". 
		if($result)
		{
			echo "OK: Test update successful!";
			echo "<br>";
			echo "<a href='index.php'>Back to main page</a>";
		}
		else
		{
			echo mysqli_error();
		}
	}
	elseif ($code != $usercode )
	{
		echo "Error: Incorrect code. Please try again.";
	}
	elseif ($user == "")
	{
		echo "Error: Please send data using MalUpdater!";
	}
	elseif ($name == "")
	{	
		echo "OK: Not playing anything, so no new information.  Not updating database.";
	}
	elseif ($name == $info_mal['name'] & $ep == $info_mal['ep'])
	{
		echo "OK: Same information as last update.  Not updating database.";
	}
	else
	{	
		$sql="INSERT INTO $tbl_name (`ID` ,`timestamp` ,`user` ,`animeID` ,`name` ,`ep` ,`eptotal` ,`picurl`) VALUES (NULL ,CURRENT_TIMESTAMP ,'$user', '$animeID', '$name', '$ep', '$eptotal', '$picurl');";
		$result = $con->query($sql);
		// if successfully insert data into database, displays message "Successful". 
		if($result)
		{
			echo "OK: Update posted successfully";
			echo "<br>";
			echo "<a href='index.php'>Back to main page</a>";
		}
		else
		{
			echo mysqli_error();
		}
	}
}
 
// close connection 
$con->close();
?>
</body>
</html>