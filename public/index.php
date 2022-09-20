<?php

use app\Framework\Database\Connection;

session_start();

require '../vendor/autoload.php';
require './bootstrap.php';

Connection::getConnection();