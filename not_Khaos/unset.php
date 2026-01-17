<?php

require('inc/functions.php');
unset ($_SESSION['loggedIn']);
header("location: index");