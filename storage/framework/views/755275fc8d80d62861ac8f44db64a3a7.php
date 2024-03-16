<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">

<?php echo $__env->make('admin.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<style>

    .title{
        color: white; 
        padding-top: 45px; 
        font-size:25px
    }
    label{
        display: inline-block;
        width: 200px;
    }

</style>

  </head>
  <body>

      <!-- partial -->
      <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

     <?php echo $__env->make('admin.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

            <div class="container" align="center">
            <h1 class="title">Update Products</h1>
    
            
    
            <?php if(session()->has('message')): ?>
                
              <div class="alert alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;
                    
                  </span>
                </button>
                
                <?php echo e(session()->get('message')); ?>

              </div>
    
              <?php endif; ?>
    
            <form action="<?php echo e(url('updateproduct', $data->id)); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
    
                <div style="padding: 15px">
                    <label for="">Product Title</label>
                    <input style="color: black" type="text" name="title" value="<?php echo e($data->title); ?>" required="">
                </div>
    
                <div style="padding: 15px">
                    <label for="">Price</label>
                    <input style="color: black" type="number" name="price" value="<?php echo e($data->price); ?>" required="">
                </div>
    
                <div style="padding: 15px">
                    <label for="">Description</label>
                    <input style="color: black" type="text" name="des" value="<?php echo e($data->description); ?>" required="">
                </div>
    
                <div style="padding: 15px">
                    <label for="">Quantity</label>
                    <input style="color: black" type="text" name="quantity" value="<?php echo e($data->quantity); ?>" required="">
                </div>

                <div style="padding: 15px">
                    <label for="">Current Image</label>
                    <img height="200" width="200" src="/productimage/<?php echo e($data->image); ?>">
                </div>
    
                <div style="padding: 15px">
                    <label>Change Image</label>
                    <input type="file" name="file">
                </div>
    
                <div style="padding: 15px">
                    <input class="btn btn-success" type="submit">
                </div>
            </form>
    
            </div>

          <!-- partial -->

          <?php echo $__env->make('admin.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  </body>
</html><?php /**PATH C:\xampp\htdocs\cb009892\resources\views/admin/updateview.blade.php ENDPATH**/ ?>