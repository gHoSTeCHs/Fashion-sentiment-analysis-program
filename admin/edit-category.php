<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');



?>

<div class="container">
  <div class="row mt-4">
    <div class="col-md-12">
      <?php
      if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $category = getById("categories", $id);

        if (mysqli_num_rows($category) > 0) {
          $data = mysqli_fetch_array($category);
      ?>
          <div class="card">
            <div class="card-header">
              <h4>Add Category</h4>
            </div>
            <div class="card-body">
              <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-md-6">
                    <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                    <label for=""> Name</label>
                    <input type="text" value="<?= $data['name'] ?>" name="name" placeholder="Enter category name" class="form-control">
                  </div>

                  <div class="col-md-6">
                    <label for=""> Slug</label>
                    <input type="text" value="<?= $data['slug'] ?>" name=" slug" placeholder="Enter slug" class="form-control">
                  </div>

                  <div class="col-md-12">
                    <label for="">Discription</label>
                    <textarea name="description" rows="3" placeholder="Enter description" class="form-control"><?= $data['description'] ?></textarea>
                  </div>

                  <div class="col-md-6">
                    <label for=""> Image</label>
                    <input type="file" name="image" class="form-control">
                    <label for="">Current image</label>
                    <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                    <img src="../uploads/<?= $data['image'] ?>" height="50px" width="50px" alt="">
                  </div>

                  <div class="col-md-6">
                    <label for="">Meta Title</label>
                    <input type="text" value="<?= $data['meta_title'] ?>" name="meta_title" placeholder="Enter meta title" class="form-control">
                  </div>

                  <div class="col-md-12">
                    <label for="">Meta Discription</label>
                    <textarea name="meta_description" rows="3" placeholder="Enter meta discription" class="form-control"><?= $data['meta_description'] ?></textarea>
                  </div>

                  <div class="col-md-12">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" placeholder="Enter meta keywords" class="form-control"><?= $data['meta_keywords'] ?></textarea>
                  </div>

                  <div class="col-md-6">
                    <label for="">Status</label>
                    <input type="checkbox" name="status">
                  </div>

                  <div class="col-md-6">
                    <label for="">Popular</label>
                    <input type="checkbox" <?= $data['popular'] ? 'checked' : '' ?> name="popular">
                  </div>

                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                  </div>

                </div>
              </form>
            </div>

          </div>

      <?php
        } else {
          echo "Category not found";
        }
      } else {
        echo "Id missing from url";
      }
      ?>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>