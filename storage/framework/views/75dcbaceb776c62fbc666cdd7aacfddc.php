<!DOCTYPE html>
<html lang="en">
  <head>

    <?php echo $__env->make('admin.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

      <style>
          .prdctimg {
              height: auto;
              width: 60px;
          }
      </style>

  </head>
  <body>

      <!-- partial -->
      <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

     <?php echo $__env->make('admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- partial -->

        <div class="main-panel">
            <div style="padding-top: 20px" class="container">

                <?php if(session()->has('message')): ?>

                <div class="alert alert-success">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;

                    </span>
                  </button>

                  <?php echo e(session()->get('message')); ?>

                </div>

                <?php endif; ?>

                <div style="padding: 30px 0;">
                    <h1 class="title" style="font-size: 25px">Show Added Products</h1>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>

                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                        <td><?php echo e($product->title); ?></td>
                        <td><?php echo e($product->description); ?></td>
                        <td><?php echo e($product->quantity); ?></td>
                        <td><?php echo e($product->price); ?></td>
                        <td> <img class="prdctimg" src="/productimage/<?php echo e($product->image); ?>" > </td>
                        <td><a class="btn btn-inverse-primary" href="<?php echo e(url('updateview', $product->id)); ?>">Update</a></td>
                        <td><a class="btn btn-inverse-danger" href="<?php echo e(url('deleteproduct', $product->id)); ?>">Delete</a></td>
                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>

            </div>
        </div>

          <!-- partial -->

          <?php echo $__env->make('admin.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  </body>
</html>
<?php /**PATH C:\xampp\htdocs\cb009892\resources\views/admin/showproduct.blade.php ENDPATH**/ ?>