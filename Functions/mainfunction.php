<?php
  require('customizer.php');
function dbcon()
{
    /*Establishes a database connection First line allows useful display of errors*/

    if (GATEWAY == "LOCAL") {
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $connect = new mysqli('localhost', 'ericmcwinner', '0beledate17111998', 'ericmcwinner');
        return $connect;
    }
    if (GATEWAY == "ONLINE") {
        $connect = new mysqli('shareddb-h.hosting.stackcp.net', 'ericmcwinner-3331b5b7', 'aWX1lrD2', 'ericmcwinner-3331b5b7');
        return $connect;
    }
}
function redirect($url)
{
    /*Function to redirect a user to a different page*/
    header("Location:{$url}");
    exit;
}
