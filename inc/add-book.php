<?php 
session_start();
require_once("../config/config.php");
require_once("../config/db.php");

if (isset($_POST['add-book'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $query = "INSERT INTO books(title, author, description) VALUES ('$title', '$author', '$description')";
    
    if (mysqli_query($conn, $query)) {
        $_SESSION['msg'] = array(
            'message' => 'New book was inserted!',
            'class' => 'alert-success bg-success'
        );
        header('Location:../index.php');
    }
} else {
    $_SESSION['msg'] = array(
        'message' => 'New book was NOT inserted!',
        'class' => 'alert-danger bg-danger'
    );
    header('Location:../index.php');
}

?>