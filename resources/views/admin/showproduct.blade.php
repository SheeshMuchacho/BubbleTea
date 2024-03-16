<!DOCTYPE html>
<html lang="en">
  <head>

    @include('admin.css')

      <style>
          .prdctimg {
              height: auto;
              width: 60px;
          }
      </style>

  </head>
  <body>

      <!-- partial -->
      @include('admin.sidebar')

     @include('admin.navbar')
        <!-- partial -->

        <div class="main-panel">
            <div style="padding-top: 20px" class="container">

                @if(session()->has('message'))

                <div class="alert alert-success">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;

                    </span>
                  </button>

                  {{session()->get('message')}}
                </div>

                @endif

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

                    @foreach($data as $product)

                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td> <img class="prdctimg" src="/productimage/{{$product->image}}" > </td>
                        <td><a class="btn btn-inverse-primary" href="{{url('updateview', $product->id)}}">Update</a></td>
                        <td><a class="btn btn-inverse-danger" href="{{url('deleteproduct', $product->id)}}">Delete</a></td>
                    </tr>

                    @endforeach
                </table>

            </div>
        </div>

          <!-- partial -->

          @include('admin.script')

  </body>
</html>
