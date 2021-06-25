<?php 
session_start();
require_once("../config/config.php");
require_once("../config/db.php");

if (isset($_POST['edit-book'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $author = mysqli_real_escape_string($conn, $_POST['author']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $query = "UPDATE books SET title = '$title', author = '$author', description = '$description' WHERE id = '$id'";
    
    if (mysqli_query($conn, $query)) {
        $_SESSION['msg'] = array(
            'message' => 'The book was updated!',
            'class' => 'alert-success bg-success'
        );
        header('Location:../index.php');
    }
} else {
    $_SESSION['msg'] = array(
        'message' => 'The book was NOT updated!',
        'class' => 'alert-danger bg-danger'
    );
    header('Location:../index.php');
}

?>