<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');



?>

<div class="container">
  <div class="row mt-4">
    <div class="col-md-12">
      <?php
      //
      if (isset($_GET['id'])) {
        //
        $id = $_GET['id'];
        $product = getById("products", $id);
        if (mysqli_num_rows($product) > 0) {
          $data = mysqli_fetch_array($product);
      ?>
          <div class="card">
            <div class="card-header">
              <h4>Edit Product</h4>
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
                          <option value="<?= $item["id"] ?>" <?= $data["category_id"] == $item["id"] ? 'selected' : ''; ?>><?= $item["name"] ?></option>
                          <!--  -->
                      <?php
                        }
                      } else {
                        echo "No category avaliable";
                      }

                      ?>
                    </select>
                  </div>
                  <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                  <div class="col-md-6">
                    <label for=""> Name</label>
                    <input type="text" required name="name" value="<?= $data['name']; ?>" placeholder="Enter product name" class="form-control">
                  </div>

                  <div class="col-md-6">
                    <label for=""> Slug</label>
                    <input type="text" required name="slug" value="<?= $data['slug']; ?>" placeholder="Enter slug" class="form-control">
                  </div>

                  <div class="col-md-12">
                    <label for="">Small Discription</label>
                    <textarea name="small_description" rows="3" required placeholder="Enter small description" class="form-control"><?= $data['small_description']; ?></textarea>
                  </div>

                  <div class="col-md-12">
                    <label for="">Discription</label>
                    <textarea name="description" required rows="3" placeholder="Enter description" class="form-control"><?= $data['description']; ?></textarea>
                  </div>

                  <div class="col-md-6">
                    <label for=""> Original Price</label>
                    <input type="text" required name="original_price" placeholder="Enter original price" value="<?= $data['original_price']; ?>" class="form-control">
                  </div>

                  <div class="col-md-6">
                    <label for=""> Selling Price</label>
                    <input type="text" required name="selling_price" value="<?= $data['selling_price']; ?>" placeholder="selling_price" class="form-control">
                  </div>

                  <div class="col-md-6">
                    <label for=""> Image</label>
                    <input type="file" name="image" class="form-control">
                    <label for="">Current image</label>
                    <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                    <img src="../uploads/<?= $data['image'] ?>" height="50px" width="50px" alt="">
                  </div>

                  <div class="row">
                    <!--  -->
                    <div class="col-md-6">
                      <label for=""> Quantity</label>
                      <input type="number" value="<?= $data['qty']; ?>" required name="qty" placeholder="Quantity" class="form-control">
                    </div>

                    <div class="col-md-6">
                      <label for="">Status</label>
                      <input type="checkbox" <?= $data['status'] == '0' ? '' : 'checked'; ?> name="status">
                    </div>

                    <div class="col-md-6">
                      <label for="">Trending</label>
                      <input type="checkbox" <?= $data['trending'] == '0' ? '' : 'checked'; ?> name="trending">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <label for="">Meta Title</label>
                    <input type="text" required name="meta_title" placeholder="Enter meta title" value="<?= $data['meta_title']; ?>" class="form-control">
                  </div>

                  <div class="col-md-12">
                    <label for="">Meta Discription</label>
                    <textarea name="meta_description" rows="3" placeholder="Enter meta discription" class="form-control"><?= $data['meta_description']; ?></textarea>
                  </div>

                  <div class="col-md-12">
                    <label for="">Meta Keywords</label>
                    <textarea name="meta_keywords" rows="3" placeholder="Enter meta keywords" class="form-control"><?= $data['meta_keywords']; ?></textarea>
                  </div>

                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                  </div>

                </div>
              </form>
            </div>

          </div>
      <?php

        } else {
          echo "Product not found";
        }
      } else {
        echo "Id missing from url";
      }
      ?>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>