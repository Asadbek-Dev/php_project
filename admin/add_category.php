<?php
include 'header.php';
include '../db_helper.php';
if(isset($_POST['cat_add'])){
    $title=$_POST['title'];
   addCategory($title);
    header("Location: /admin/category.php");exit;
}
?>
<div class="container">
    <div class="row">
        <form method="post">
            <div class="mb-3">
                <label for="category_name_input" class="form-label">Kategorya nomi</label>
                <input type="text" class="form-control" id="category_name_input" name="title">
            </div>
            <button type="submit" name="cat_add" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
