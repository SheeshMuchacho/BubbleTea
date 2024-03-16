<style>
  .col-md-4 img{
    height: 200px;
    width: 349px;
  }
</style>

<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="">view all products <i class="fa fa-angle-right"></i></a>

            <form action="<?php echo e(url('search')); ?>" method="get" class="form-inline" style="padding: 20px 0;">

              <?php echo csrf_field(); ?>

              <input class="form-control" type="search" name="search" placeholder="Search products"
                     style="width: 30%; font-size: 14px;">
              <input type="submit" value="Search" class="btn btn-success"
                     style="font-size: 11px; padding: 10px 15px; margin: 0 10px; background-color: #0a0a0a">

            </form>

          </div>
        </div>


        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="/productimage/<?php echo e($Product->image); ?>" alt=""></a>
            <div class="down-content">
              <a href="#"><h4><?php echo e($Product->title); ?></h4></a>
              <h6>LKR <?php echo e($Product->price); ?></h6>
              <p><?php echo e($Product->description); ?></p>

              <a class="btn btn-primary" style="font-size: 13px; background-color: rgb(226, 59, 59); border-color: rgb(228, 5, 5);" href="#">Add to Cart</a>

            </div>
          </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if(method_exists($data, 'links')): ?>
        <div class="d-flex justify-content-center">

          <?php echo $data->links(); ?>


        </div>
        <?php endif; ?>


        


      </div>
    </div>
  </div>
<?php /**PATH C:\xampp\htdocs\cb009892\resources\views/user/product.blade.php ENDPATH**/ ?>