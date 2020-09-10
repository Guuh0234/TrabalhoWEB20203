<?php

$db_url       = parse_url(getenv("CLEARDB_DATABASE_URL"));
$db_user      = $db_url["root"];
$db_password  = $db_url[""];
$db_host      = $db_url["localhost"];
$db_database  = substr($db_url["path"], 1);

/*
    
    const db_host = "localhost";
    const db_user = "root";
    const db_password = "";
    const db_database = "vendas";
*/
