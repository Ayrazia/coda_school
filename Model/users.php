<?php

    function GetAll(PDO $pdo): array
    {
        $res = $pdo->query('SELECT * FROM users');
        $res->execute();
        return $res->fetchAll();
    }