<?php

// Headers

header('Access-control-allow-origin: *');
header('Content-Type: application/json');
include_once '../config/Database.php';
include_once '../models/Post.php';

//Instantiate Database

$database = new Database();
$db = $database->connect();

//Post object

$post = new Post($db);

//Get Id

$post->id = isset($_GET['id']) ? $_GET['id'] : die();

//Get Post

$post->getpost();

//create array

$post_arr =array(
    'id'=>$post->id,
    'title'=>$post->title,
    'body'=>$post->body,
    'author'=>$post->author,
    'category_id'=>$post->category_id,
    'category_name'=>$post->category_name,
);

//To json

print_r(json_encode($post_arr));


