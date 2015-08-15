<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// REST import
$RESTstring = file_get_contents('http://nhs-json.azurewebsites.net');
$RESTarray = explode(':::',$RESTstring);

$serverName = $RESTarray[1];
$serverAdmin = $RESTarray[3];
$serverPassword = $RESTarray[5];

$dbname = "testdb1";

$serverID = $serverAdmin . "@" . $serverName;
$server = "tcp:" . $serverName . ".database.windows.net,1433";
$connectionOptions = array( "Database"=>$dbname, "UID"=>$serverID, "PWD"=>$serverPassword);
$conn = sqlsrv_connect($server, $connectionOptions);

if($conn == false) {
    echo 'Connection failed. ';
    die(print_r(sqlsrv_errors(), true));
}

//$conn = new mysqli("myServer", "myUser", "myPassword", "Northwind");

//$result = $conn->query("SELECT CompanyName, City, Country FROM Customers");

$query = "SELECT * FROM users";
$result = sqlsrv_query($conn, $query) or die("Query to check login authentication failed");
if (!$result) {
    die("Database query failed!");
}

$outp = "";
while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) {
    if ($outp != "") {
        $outp .= ",";
    }
    $outp .= '{"Username":"'  . $rs["username"] . '",';
    $outp .= '"Password":"'   . $rs["password"]        . '"}';
}
/*
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"Name":"'  . $rs["CompanyName"] . '",';
    $outp .= '"City":"'   . $rs["City"]        . '",';
    $outp .= '"Country":"'. $rs["Country"]     . '"}'; 
}
$outp ='{"records":['.$outp.']}';
$conn->close();
*/
echo($outp);
?>
