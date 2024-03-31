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
              <h3 class="page-title">Show Added Products</h3>

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active">Navigation</li>
                  <li class="breadcrumb-item active">Product</li>
                  <li class="breadcrumb-item">View Product</li>
                </ol>
              </nav>
            </div>

            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">


            <div style="padding: 20px 50px 20px 50px">

                <?php if(session()->has('message')): ?>

                <div class="alert alert-success">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;

                    </span>
                  </button>

                  <?php echo e(session()->get('message')); ?>

                </div>

                <?php endif; ?>

                <table class="table table-striped">
                    <thead>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th style="text-align: center">Update</th>
                        <th style="text-align: center">Delete</th>
                    </thead>

                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tbody>
                        <td style="color: white"><?php echo e($product->title); ?></td>
                        <td style="color: white; max-width: 600px; overflow-wrap: break-word;" class="description-cell"><?php echo e($product->description); ?></td>
                        <td style="color: white"><?php echo e($product->quantity); ?></td>
                        <td style="color: white"><?php echo e($product->price); ?></td>
                        <td class="py-1"> <img class="prdctimg" src="/productimage/<?php echo e($product->image); ?>" style="height: 60px; width: 60px"> </td>
                        <td style="text-align: center"><a class="btn btn-inverse-primary" href="<?php echo e(url('updateview', $product->id)); ?>">Update</a></td>
                        <td style="text-align: center"><a class="btn btn-inverse-danger" href="<?php echo e(url('deleteproduct', $product->id)); ?>">Delete</a></td>
                    </tbody>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>


                </div>
              </div>
            </div>
            </div>
          </div>
         </div>
        </div>


          <!-- partial -->

          <script>
            // Get all description cells
            const descriptionCells = document.querySelectorAll('.description-cell');
        
            // Iterate over each description cell
            descriptionCells.forEach(cell => {
                // Check if the content exceeds the width of the cell
                if (cell.scrollWidth > cell.clientWidth) {
                    // Apply CSS white-space property to break words and wrap text
                    cell.style.whiteSpace = 'pre-wrap';
                    // Add padding to the top and bottom of the cell
                    cell.style.paddingTop = '5px'; // Adjust the value as needed
                    cell.style.paddingBottom = '5px'; // Adjust the value as needed
                }
            });
        </script>

          <?php echo $__env->make('admin.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  </body>
</html>
<?php /**PATH C:\xampp\htdocs\cb009892\resources\views/admin/showproduct.blade.php ENDPATH**/ ?>