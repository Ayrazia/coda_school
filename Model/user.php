<?php

function user(PDO $pdo, int $id) : array
{
    try {
        $res = $pdo->prepare('SELECT username, email, enabled FROM users WHERE id = :id');
        $res->bindValue(':id', $id, PDO::PARAM_INT);
        $res->execute();
        return $res->fetch(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        var_dump($e->getMessage());
    }

}

function updateUser(PDO $pdo, int $id, string $username, string $email, int $enabled)
{
    try {
        $res = $pdo->prepare('UPDATE users SET username = :username, email = :email, enabled = :enabled WHERE id = :id');
        $res->bindValue(':username', $username);
        $res->bindValue(':email', $email);
        $res->bindValue(':enabled', $enabled, PDO::PARAM_INT);
        $res->bindValue(':id', $id, PDO::PARAM_INT);
        $res->execute();
    }
    catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}


function updatePassword(PDO $pdo, int $id, string $password)
{
    try {
        $res = $pdo->prepare('UPDATE users SET password = :password WHERE id = :id');
        $res->bindValue(':password', $password);
        $res->bindValue(':id', $id, PDO::PARAM_INT);
        $res->execute();
    }
    catch (PDOException $e) {
        var_dump($e->getMessage());
    }
}