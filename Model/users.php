<?php

    function GetAll(PDO $pdo): array
    {
        $res = $pdo->query('SELECT * FROM users');
        $res->execute();
        return $res->fetchAll();
    }

    function toggleEnabled(PDO $pdo, int $id): void
    {
        $res = $pdo->prepare('UPDATE users SET enabled = NOT enabled WHERE id = :id');
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        $res->execute();
    }

function delete(PDO $pdo, int $id)
{
    try {
        $res = $pdo->prepare('DELETE FROM users WHERE id = :id');
        $res->bindParam(':id', $id, PDO::PARAM_INT);
        return $res->execute();
    } catch (Exception $e) {
        return false;
    }
}
