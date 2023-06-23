<?php

function getMacAddress() {
    $output = shell_exec('ipconfig /all'); // Execute a command to get network information (Windows)
    // For Linux/Mac, you can use 'ifconfig' or 'ip addr show' instead of 'ipconfig'

    if (preg_match('/Physical Address.*: ([\w-]+)/', $output, $matches)) {
        $macAddress = $matches[1];
        return $macAddress;
    }
    return null;
}

function checkMACifWhiteList($mac, $whitelistArray) {
    if (in_array($mac, $whitelistArray)) {
        echo "$mac is included in the whitelist";
        //continue showing 
    } else {
        echo "$mac is NOT included in the whitelist"; //
        header("Location: https://www.example.com/otherpage.php");
		exit(); // Make sure to exit the script after the redirect
    }
}

$macAddress = getMacAddress();
$whiteListMAC = array(" 4-27-EA-5D-7B-AD", "12-23-45-56-67-78", "23-45-56-67-78", "64-34-56-36-AF"); //add
checkMACifWhiteList($macAddress,$whiteListMAC);


?>
