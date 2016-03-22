<?php
header("Access-Control-Allow-Origin: *");
// Server account details
$serverName = "a5kkowq9mr";
$serverAdmin = "cesarfelix";
$serverPassword = "admin12£";


// Receives POST request
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$server = $request->server;

// Checks if the POST request is correct, then returns a JSON string
if ($server === "details") {
//    $json   = array();
    $json = array(
        'name' => $serverName,
        'admin' => $serverAdmin,
        'password' => $serverPassword
    );

    // Converts the array to a JSON string
    $jsonstring = json_encode($json);
    echo $jsonstring;
}else{
    echo "error";
}
?>
