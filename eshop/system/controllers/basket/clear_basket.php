<?php

session_start();

$_SESSION['basket'] = null; //если ругается на null, то заменить на пустой массив = [];

header('Location: '.$_SERVER['HTTP_REFERER']);