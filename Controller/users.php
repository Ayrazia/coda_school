<?php
require "Model/users.php";
/**
 * @var PDO $pdo
 */

    $users = GetAll($pdo);



    require 'View/users.php';