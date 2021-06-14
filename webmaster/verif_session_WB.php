<?php
session_start();
if(!(bool)$_SESSION['is_Webmaster'])
{
    header("Location: https://pcp21.charles-poncet.net:8081/");
}
?>
