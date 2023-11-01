<?php

include('../middleware/adminMiddleware.php');
include('includes/header.php');



?>

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <h4>Products</h4>
        </div>
        <div class="card-body" id="products_table">
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $product = getAll("products");

                if (mysqli_num_rows($product) > 0) {
                  foreach ($product as $item) {
                    $res = $item['image'];
                    $res = explode(" ", $res);
                ?>
                    <tr>
                      <td><?= $item['id']; ?></td>
                      <td><?= $item['name']; ?></td>
                      <td>
                        <img src="../uploads/<?= $res[0]; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                      </td>

                      <td><?= $item['status'] == '0' ? "Visible" : "Hidden"; ?></td>
                      <td>

                        <a href="edit-product.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                      </td>
                      <td>

                        <button class="btn btn-sm btn-danger delete_product_btn" type="button" value="<?= $item['id']; ?>">Delete</button>


                      </td>
                    </tr>
                <?php
                  }
                } else {
                  echo "No records found";
                }
                ?>

              </tbody>

            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>