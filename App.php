<?php

namespace c42\EXAM;

require_once 'inc/connection.php';
require_once 'classes/request.php';
require_once 'classes/session.php';
require_once 'classes/validation.php';
require_once 'classes/moveImage.php';

use c42\EXAM\classes\request;
use c42\EXAM\classes\session;
use c42\EXAM\classes\validation;
use c42\EXAM\classes\moveImage;

$request = new request;
$session = new session;
$validation = new validation;
$moveImage = new moveImage;
