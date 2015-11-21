<?php
try
{
	$dsn = "mysql:host=localhost;dbname=kumara7_breakpoverty2015";
    $user = 'kumara7_breakpov';
    $pass = '<br/eak>';
    $dbh = new PDO($dsn, $user, $pass);
}
catch (PDOException $e)
{
   echo("Error: ".$e->getMessage()."<br />");
}

?>
