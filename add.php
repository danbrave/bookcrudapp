<?php include "inc/header.php" ?>

<?php include "inc/navbar.php" ?>

<h1 class="text-center">Add new book into the system</h1>

<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <form action="inc/add-book.php" method="POST">
            <div class="form-group">
                <label for="title">Book Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="author">Book Author</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Author(s)">
            </div>
            <div class="form-group">
                <label for="author">Book Description</label>
                <textarea type="text" class="form-control" id="description" name="description" rows="12"></textarea>
            </div>
            <button type="submit" class="btn btn-primary d-block p-3" name="add-book">Add New Book</button>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
<!-- Row End -->


<?php include "inc/footer.php" ?>