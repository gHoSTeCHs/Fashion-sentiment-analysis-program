<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');



?>

<div class="container">
  <div class="row mt-4">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>Add Products</h4>
        </div>
        <div class="card-body">
          <form action="code.php" method="POST" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <label for=""> Select Category</label>
                <select name="category_id" class="form-select">
                  <option selected>Select Category</option>
                  <?php
                  //
                  $categories = getAll("categories");
                  //
                  if (mysqli_num_rows($categories) > 0) {
                    foreach ($categories as $item) {
                      //
                  ?>
                      <!--  -->
                      <option value="<?= $item["id"] ?>"><?= $item["name"] ?></option>
                      <!--  -->
                  <?php
                    }
                  } else {
                    echo "No category avaliable";
                  }

                  ?>
                </select>
              </div>

              <div class="col-md-6">
                <label for=""> Name</label>
                <input type="text" required name="name" placeholder="Enter product name" class="form-control">
              </div>

              <div class="col-md-6">
                <label for=""> Slug </label>
                <input type="text" required name="slug" placeholder="Enter product slug" class="form-control">
              </div>

              <div class="col-md-12">
                <label for="">Company</label>
                <textarea name="small_description" rows="3" placeholder="Enter Product Company" class="form-control"></textarea>
              </div>

              <div class="col-md-12">
                <label for="">Discription</label>
                <textarea name="description" required rows="3" placeholder="Enter description" class="form-control"></textarea>
              </div>

              <div class="col-md-6">
                <label for=""> Age group </label>
                <input type="text" name="original_price" placeholder="Enter age group" class="form-control">
              </div>

              <div class="col-md-6">
                <label for=""> Units sold</label>
                <input type="text" name="selling_price" placeholder="Enter No of units sold" class="form-control">
              </div>

              <div class="col-md-6">
                <label for="">Upload Image</label>
                <input type="file" multiple required name="image[]" class="form-control">
              </div>

              <div class="row">
                <!--  -->
                <div class="col-md-6">
                  <label for="">Price</label>
                  <input type="text" required name="qty" placeholder="Enter Price" class="form-control">
                </div>

                <div class="col-md-6">
                  <label for="">Status</label>
                  <input type="checkbox" name="status">
                </div>

                <div class="col-md-6">
                  <label for="">Trending</label>
                  <input type="checkbox" name="trending">
                </div>
              </div>

              <div class="col-md-6">
                <label for="">Size</label>
                <input type="text" name="meta_title" placeholder="Avaliable sizes" class="form-control">
              </div>

              <div class="col-md-12">
                <label for="">Meta Discription</label>
                <textarea name="meta_description" rows="3" placeholder="Enter meta discription" class="form-control"></textarea>
              </div>

              <div class="col-md-12">
                <label for="">Meta Keywords</label>
                <textarea name="meta_keywords" rows="3" placeholder="Enter meta keywords" class="form-control"></textarea>
              </div>

              <div class="col-md-12">
                <button type="submit" class="btn btn-primary" name="add_product_btn">Save</button>
              </div>

            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>