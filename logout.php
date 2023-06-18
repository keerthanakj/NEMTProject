<?php

define('PAGE','logout');
require_once 'source/session.php';

session_destroy();
header('location: home.php');

?>