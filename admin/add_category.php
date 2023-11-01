<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>

<div class="container">
  <div class="row mt-4">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Add Category</h4>
        </div>
        <div class="card-body">
          <form action="code.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <label for=""> Name</label>
                <input type="text" name="name" placeholder="Enter category name" class="form-control">
              </div>

              <div class="col-md-6">
                <label for=""> Slug</label>
                <input type="text" name="slug" placeholder="Enter slug" class="form-control">
              </div>

              <div class="col-md-12">
                <label for="">Discription</label>
                <textarea name="description" rows="3" placeholder="Enter description" class="form-control"></textarea>
              </div>

              <div class="col-md-6">
                <label for=""> Image</label>
                <input type="file" name="image" class="form-control">
              </div>

              <div class="col-md-6">
                <label for="">Meta Title</label>
                <input type="text" name="meta_title" placeholder="Enter meta title" class="form-control">
              </div>

              <div class="col-md-12">
                <label for="">Meta Discription</label>
                <textarea name="meta_description" rows="3" placeholder="Enter meta discription" class="form-control"></textarea>
              </div>

              <div class="col-md-12">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keywords" rows="3" placeholder="Enter meta keywords" class="form-control"></textarea>
              </div>

              <div class="col-md-6">
                <label for="">Status</label>
                <input type="checkbox" name="status">
              </div>

              <div class="col-md-6">
                <label for="">Popular</label>
                <input type="checkbox" name="popular">
              </div>

              <div class="col-md-12">
                <button type="submit" class="btn btn-primary" name="add_category_btn">Save</button>
              </div>

            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>