<?php

require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/User.php');
require_once(__DIR__ . '/Comment.php');

$datetime = new DateTime();

$user1 = new User(1, "Greg", "greg@yandex.ru", "12345678");
$user2 = new User(2, "Danila", "danila@yandex.ru", "123456789");
$user3 = new User(3, "Lilo", "lilo@yandex.ru", "12345678910");
$user4 = new User(4, "Puaro", "puaro@yandex.ru", "1234567891011");
$user5 = new User(5, "Gans", "gans@yandex.ru", "123456789101112");

$comment1 = new Comment($user1, "Hello");
$comment2 = new Comment($user2, "Privet");
$comment3 = new Comment($user3, "Aloha");
$comment4 = new Comment($user4, "Bonjour");
$comment5 = new Comment($user5, "Hi");

$comments = [];
array_push($comments, $comment1, $comment2, $comment3, $comment4, $comment5);

foreach ($comments as $com) {
    if ($com->getUser()->getDate() > $datetime) {
        echo $com->getText() . '<br>';
        echo $datetime->format("Y-m-d H-m-s") . '<br>';
    }
}