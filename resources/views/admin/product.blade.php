<!DOCTYPE html>
<html lang="en">
  <head>

    @include('admin.css')

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
        @include('admin.sidebar')

        @include('admin.navbar')
        <!-- partial -->

        <div class="container-fluid page-body-wrapper">

        <div class="container">
        <h1 class="title">Add Products</h1>


        @if(session()->has('message'))

          <div class="alert alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;

              </span>
            </button>

            {{session()->get('message')}}
          </div>

          @endif


        <form action="{{url('uploadproduct')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group" style="margin: 40px 0;">
                <label for="">Product Title</label>
                <input class="form-control-plaintext" type="text" name="title" placeholder="Give a Product Title" required="">
            </div>

            <div class="form-group" style="margin: 40px 0;">
                <label for="">Price</label>
                <input class="form-control-plaintext" type="number" name="price" placeholder="Give a Price" required="">
            </div>

            <div class="form-group" style="margin: 40px 0;">
                <label for="">Description</label>
                <input class="form-control-plaintext" type="text" name="des" placeholder="Give a Description" required="">
            </div>

            <div class="form-group" style="margin: 40px 0;">
                <label for="">Quantity</label>
                <input class="form-control-plaintext" type="text" name="quantity" placeholder="Product Quantity" required="">
            </div>

            <div class="form-group" style="margin: 40px 0;">
                <input class="form-control-file" style="padding: 8px" type="file" name="file">
            </div>

            <div class="form-group" style="margin: 40px 0;">
                <input class="btn btn-success" type="submit">
            </div>
        </form>

        </div>

          <!-- partial -->

        @include('admin.script')

  </body>
</html>
