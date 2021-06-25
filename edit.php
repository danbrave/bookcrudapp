<?php require_once("config/db.php");

// BOOK ID
$id = mysqli_real_escape_string($conn, $_GET['id']);

$book_query = "SELECT * FROM books WHERE id =" . $id;
$results = mysqli_query($conn, $book_query);
$book = mysqli_fetch_assoc($results);

mysqli_free_result($results);

mysqli_close($conn);

?>

<?php include "inc/header.php" ?>

<?php include "inc/navbar.php" ?>

<main role="main">

    <h1 class="text-center"><?php echo $book['title'] ?></h1>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form action="inc/edit-book.php" method="POST">
                <div class="form-group">
                    <label for="title">Book Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo isset($book['title']) ? $book['title'] : "Enter new title"; ?>">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
                </div>
                <div class="form-group">
                    <label for="author">Book Author</label>
                    <input type="text" class="form-control" id="author" name="author" value="<?php echo isset($book['author']) ? $book['author'] : "Enter new author"; ?>">
                </div>
                <div class="form-group">
                    <label for="author">Book Description</label>
                    <textarea type="text" class="form-control" id="description" name="description" rows="12"><?php echo isset($book['description']) ? $book['description'] : "Enter new description"; ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="edit-book">Submit</button>
            </form>
        </div>
        <div class="col-md-3"></div>
    </div>
</main>

<?php include "inc/footer.php" ?>