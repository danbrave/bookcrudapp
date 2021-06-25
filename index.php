<?php 

session_start();

require_once("config/db.php");

$query = "SELECT * FROM books";
$results = mysqli_query($conn, $query);
$books = mysqli_fetch_all($results, MYSQLI_ASSOC);

// print_r($books);
mysqli_free_result($results);

mysqli_close($conn);

?>

<?php include "inc/header.php" ?>

<?php include "inc/navbar.php" ?>

<main role="main">

    <body>
        <div class="container-fluid main-section">

        <?php if (isset($_SESSION['msg'])) : ?>

            <div class="alert <?php echo $_SESSION['msg']['class']; ?> alert-dismissible fade show" role="alert">
                <strong class="text-white p-2"><?php echo $_SESSION['msg']['message']; ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

        <?php 

            unset($_SESSION['msg']);
            endif; 
            
        ?>
            <div class="row">
                <div class="offset-lg-2 col-lg-8 section-part text-center">
                    <h1>Books</h1>
                    <P>Here are some of the top 10 psychology books everyone should read:</P>
                </div>
            </div>
            <i class="fa fa-angle-double-down blink" aria-hidden="true"></i>
        </div>

        <!-- CARD SECTION START -->
        <!-- Row Start -->
        <div class="row mt-5">


            <?php foreach ($books as $book) : ?>
                <div class="col-md-3 mb-5">
                    <div class="card-deck">
                        <div class="card">
                            <img class="card-img-top" src="/img/book.jpeg" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><strong><?php echo $book['title'] ?></strong>
                                    <h5 class="text-muted"> - Written by: <?php echo $book['author'] ?></h5>
                                    <p class="card-text"><?php echo $book['description'] ?></p>

                                    <a class="btn btn-primary" href="book.php?id=<?php echo $book['id']; ?>">Read More</a>
                                    <p class="card-text text-center"><small class="text-muted">Created at: <?php echo $book['created_at'] ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        </div>
        <!-- Row End -->

        <!-- CARD SECTION FINISH -->

</main>

<?php include "inc/footer.php" ?>