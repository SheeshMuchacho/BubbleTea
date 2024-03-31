<!DOCTYPE html>
<html lang="en">
  <head>

    <?php echo $__env->make('admin.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  </head>
  <body>

      <!-- partial -->
        <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              <div class="container-fluid page-body-wrapper">

        <?php echo $__env->make('admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- partial -->


        <div class="main-panel">
          <div class="content-wrapper">


            <div class="page-header">
              <h3 class="page-title">Add Products</h3>

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active">Management</li>
                  <li class="breadcrumb-item active">Product</li>
                  <li class="breadcrumb-item">Add Product</li>
                </ol>
              </nav>
            </div>

            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;
                    </span>
                  </button>
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

        <?php if(session()->has('message')): ?>

          <div class="alert alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;
              </span>
            </button>
            <?php echo e(session()->get('message')); ?>

          </div>

          <?php endif; ?>


        <form action="<?php echo e(url('uploadproduct')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="">Title</label>
                  <input class="form-control" name="title" placeholder="product title" required="">
            </div>

            <div class="form-group" style="margin: 40px 0;">
              <label for="">Price</label>
              <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text bg-primary text-white">LKR</span>
              </div>
                <input class="form-control" name="price" id="price" placeholder="product price" pattern="\d+(\.\d{2})?" title="Please enter a valid price in LKR (e.g., 100.00)" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                <div class="input-group-prepend">
                  <span class="input-group-text">.00</span>
                </div>
              </div>
              </div>

            <div class="form-group" style="margin: 40px 0;">
                <label for="">Description</label>
                <textarea name="des" placeholder="product description" rows="10" class="form-control" required="" style="height: 50px"></textarea>
            </div>

            <div class="form-group" style="margin: 40px 0;">
                <label for="">Quantity</label>
                <input class="form-control"  name="quantity" placeholder="product quantity" required="">
            </div>

            <div class="form-group" style="margin: 40px 0;">
                <input class="form-control-file" style="padding: 8px" type="file" name="file">
            </div>

            <div class="form-group" style="margin: 40px 0;">
                <input class="btn btn-primary me-2" type="submit">
            </div>
        </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- partial -->



        <?php echo $__env->make('admin.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  </body>
</html>
<?php /**PATH C:\xampp\htdocs\cb009892\resources\views/admin/product.blade.php ENDPATH**/ ?>