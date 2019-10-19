<?php
$ghost = $_POST["input"];
$host = gethostbyname($ghost);
$udns = gethostbyaddr($host);
if (filter_var($host, FILTER_VALIDATE_IP)) {
    echo "<h4>TARGETED DNS >>> ".$udns."<br></h4>";
    echo "<h4>TARGETED IP >>> ".$host."<br><br></h4>";
    $ports = array(20, 21, 22, 23, 25, 26, 53, 67, 68, 80, 110, 143, 443, 587, 993, 995, 2077, 2078, 2082, 2083, 2086, 2087, 3306, 3389, 8080);
    foreach ($ports as $port){
        $connection = @fsockopen($host, $port, $errno, $errstr, 2);
        if (is_resource($connection)){
            echo "<h4>✅ [!]  ".$host.":".$port." "."[".getservbyport($port,"tcp")." PORT] OPPENED   [!]</h4>"."\n";
            fclose($connection);
        } else {
        $null = null;
        }
    } 
} else {
    echo "<h4> You Have to put a valid IP...<h4>";
}
?>
