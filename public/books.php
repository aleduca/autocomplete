<?php

$pdo = new PDO('mysql:host=localhost;dbname=books', 'root', '', [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
]);

$prepare = $pdo->prepare('select id, title from books where title like :title');
$prepare->execute([
    'title' => $_GET['book'] . '%',
]);

$books = $prepare->fetchAll();

echo json_encode($books);
