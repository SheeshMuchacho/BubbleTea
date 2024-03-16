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
            <div style="padding: 20px 50px 20px 50px">

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
                        <th style="font-size: 18px">Title</th>
                        <th style="font-size: 18px">Description</th>
                        <th style="font-size: 18px">Quantity</th>
                        <th style="font-size: 18px">Price</th>
                        <th style="font-size: 18px">Image</th>
                        <th style="font-size: 18px">Update</th>
                        <th style="font-size: 18px">Delete</th>
                    </tr>

                    @foreach($data as $product)

                    <tr>
                        <td style="font-size: 14px">{{$product->title}}</td>
                        <td style="font-size: 14px">{{$product->description}}</td>
                        <td style="font-size: 14px">{{$product->quantity}}</td>
                        <td style="font-size: 14px">{{$product->price}}</td>
                        <td> <img class="prdctimg" src="/productimage/{{$product->image}}" style="height: 60px; width: 60px"> </td>
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
