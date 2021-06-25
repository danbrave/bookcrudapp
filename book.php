<?php require_once("config/db.php");

// BOOK ID
$id = mysqli_real_escape_string($conn, $_GET['id']);

$book_query = "SELECT * FROM books WHERE id =".$id;
$results = mysqli_query($conn, $book_query);
$book = mysqli_fetch_assoc($results);

mysqli_free_result($results);

mysqli_close($conn);

?>

<?php include "inc/header.php" ?>

<?php include "inc/navbar.php" ?>

<main role="main">

    <h1 class="text-center"><?php echo $book['title']?></h1>

    <!-- CARD SECTION START -->
    <!-- Row Start -->
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card mb-3">
                <img class="card-img-top" src="img/book.jpeg" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"><strong><?php echo $book['title']?></strong><h5 class="text-muted"> - Written by: <?php echo $book['author']?></h5>
                    <p class="card-text"><?php echo $book['description']?></p>
                    <p class="card-text text-right"><small class="text-muted">Created at: <?php echo $book['created_at']?></small></p>
                    <div>
                    <div class="d-flex justify-content-around">
                        <a href="edit.php?id=<?php echo $book['id']; ?>" class="btn btn-primary text-right" role="button">Edit</a>

                        <form action="./inc/delete.php" method="POST">
                            <input type="hidden" name="id" id="id" value="<?php echo $book['id']; ?>">
                            <button type="submit" class="btn btn-danger p-2" name="delete-book">Delete</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    <!-- Row End -->

    <!-- CARD SECTION FINISH -->

</main>

<?php include "inc/footer.php" ?>