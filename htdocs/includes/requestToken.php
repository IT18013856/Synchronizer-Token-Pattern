<?php
session_start();

if (session_id() === $_COOKIE["PHPSESSID"]) {
    echo $_SESSION["token"];
} // end if
?>