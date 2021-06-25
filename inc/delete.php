<?php 
session_start();
require_once("../config/config.php");
require_once("../config/db.php");

if (isset($_POST['delete-book'])) {

    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $query = "DELETE FROM books WHERE id = '$id'";
    
    if (mysqli_query($conn, $query)) {
        $_SESSION['msg'] = array(
            'message' => 'The book was deleted.',
            'class' => 'alert-success bg-success'
        );
        header('Location:../index.php');
    }
} else {
    $_SESSION['msg'] = array(
        'message' => 'The book was NOT deleted!',
        'class' => 'alert-danger bg-danger'
    );
    header('Location:../index.php');
}

?>