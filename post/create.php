<?php
// Headers

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Authorization,X-Requested-With');
include_once '../config/Database.php';
include_once '../models/Post.php';

//Instantiate Database

$database = new Database();
$db = $database->connect();

//Post object

$post = new Post($db);

//Get the raw post data

$data = json_decode(file_get_contents('php://input')); // to take request that is post

$post->title = $data->title;
$post->body = $data->body;
$post->author = $data->author;
$post->category_id = $data->category_id;

// Create post

if($post->create_post()){
    echo json_encode(
        array('message'=>'Post Created')
    );
}
else{
    echo json_encode(
        array('message'=>'Post Not Created')
    );
}