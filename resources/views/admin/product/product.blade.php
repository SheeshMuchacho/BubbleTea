<!DOCTYPE html>
<html lang="en">
  <head>

    @include('admin.css')

  </head>
  <body>

      <!-- partial -->
        @include('admin.sidebar')

              <div class="container-fluid page-body-wrapper">

        @include('admin.navbar')
        <!-- partial -->


        <div class="main-panel">
          <div class="content-wrapper">


            <div class="page-header">
              <h3 class="page-title">Add Products</h3>

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active">Management</li>
                  <li class="breadcrumb-item active">Product</li>
                  <li class="breadcrumb-item">Add Products</li>
                </ol>
              </nav>
            </div>

            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                      @if(session()->has('message'))
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                              {{ session()->get('message') }}
                          </div>
                      @endif

                      @if(session()->has('error'))
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                              {{ session()->get('error') }}
                          </div>
                      @endif


        <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
            @csrf

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



        @include('admin.script')

  </body>
</html>
