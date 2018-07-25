<?php

require_once 'login.php';
session_destroy();
//echo "Sua sessão foi pra tora!";
//header('Refresh:3, index.php');
header('location: index.php');
