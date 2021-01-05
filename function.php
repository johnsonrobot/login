<?php
    $hn = 'localhost';
    $db = 'logindata';
    $un = 'johnson';
    $pw = 'johnsonpwd';

    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error) die("check your input parameters");
    
    function createTable($name, $query){
        query_Mysql("create table if not exists $name($query)");
        echo "Table $name already existed.<br>";
    }

    function query_Mysql($query){
        global $conn;
        $result = $conn->query($query);
        if(!$result) die("execute command error");
        return $result;
    }

    function destroySession(){
        $_SESSION = array();
        if(session_id() != "" || isset($_COOKIE[session_name()]))
            setcookie(session_name(), '', time() - 2592000, '/');
        
        session_destroy();
    }

    function sanitizeString($var){
        global $conn;
        $var = strip_tags($var);
        $var = htmlentities($var);
        $var = stripslashes($var);
        return $conn->real_escape_string($var);
    }
?>