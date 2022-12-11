<?php
    // HOST
    $wepi_host = "db726044821.db.1and1.com:3306";
    // USERNAME
    $wepi_user = "dbo726044821";
    // PASSWORD
    $wepi_pass = "Ortaca_2008";
    // DATABASE
    $wepi_data = "db726044821";
    $wepi_conn = mysql_connect( $wepi_host, $wepi_user, $wepi_pass );
    $wepi_connect = mysql_select_db( $wepi_data, $wepi_conn );
?>