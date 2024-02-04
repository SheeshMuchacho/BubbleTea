<!DOCTYPE html>
<html lang="en">
  <head>

@include('admin.css')

  </head>
  <body>

      <!-- partial -->
      @include('admin.sidebar')

     @include('admin.navbar')
        <!-- partial -->

        <div style="padding-bottom: 40px; padding-top:90px;" class="container-fluid page-body-wrapper">
            <div class="container" align="center">

                @if(session()->has('message'))
            
                <div class="alert alert-success">
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;
                      
                    </span>
                  </button>
                  
                  {{session()->get('message')}}
                </div>
      
                @endif

                <table>

                    <tr style="background-color: grey">
                        <td style="padding: 20px">Title</td>
                        <td style="padding: 20px">Description</td>
                        <td style="padding: 20px">Quantity</td>
                        <td style="padding: 20px">Price</td>
                        <td style="padding: 20px">Image</td>
                        <td style="padding: 20px">Update</td>
                        <td style="padding: 20px">Delete</td>
                    </tr>

                    @foreach($data as $product)

                    <tr style="background-color: black;">
                        <td align="center">{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td align="center">{{$product->quantity}}</td>
                        <td align="center">{{$product->price}}</td>
                        <td> <img height="200" width="200" src="/productimage/{{$product->image}}"> </td>
                        <td align="center"><a class="btn btn-primary" href="{{url('updateview', $product->id)}}">Update</a></td>
                        <td align="center"><a class="btn btn-danger" href="{{url('deleteproduct', $product->id)}}">Delete</a></td>
                    </tr>

                    @endforeach

                </table>

            </div>
        </div>

          <!-- partial -->

          @include('admin.script')

  </body>
</html>