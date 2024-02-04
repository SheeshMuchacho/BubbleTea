<!DOCTYPE html>
<html lang="en">
  <head>

    <base href="/public">

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

            <div class="container" align="center">
            <h1 class="title">Update Products</h1>
    
            {{-- @if(session()->has('message'))
    
            <div class="alert alert-success">
                <button type="button" class="close" data-bs-dismiss="alert">X</button>
                {{session()->get('message')}}
            </div>
    
            @endif --}}
    
            @if(session()->has('message'))
                
              <div class="alert alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;
                    
                  </span>
                </button>
                
                {{session()->get('message')}}
              </div>
    
              @endif
    
            <form action="{{url('updateproduct', $data->id)}}" method="post" enctype="multipart/form-data">
                @csrf
    
                <div style="padding: 15px">
                    <label for="">Product Title</label>
                    <input style="color: black" type="text" name="title" value="{{$data->title}}" required="">
                </div>
    
                <div style="padding: 15px">
                    <label for="">Price</label>
                    <input style="color: black" type="number" name="price" value="{{$data->price}}" required="">
                </div>
    
                <div style="padding: 15px">
                    <label for="">Description</label>
                    <input style="color: black" type="text" name="des" value="{{$data->description}}" required="">
                </div>
    
                <div style="padding: 15px">
                    <label for="">Quantity</label>
                    <input style="color: black" type="text" name="quantity" value="{{$data->quantity}}" required="">
                </div>

                <div style="padding: 15px">
                    <label for="">Current Image</label>
                    <img height="200" width="200" src="/productimage/{{$data->image}}">
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

          @include('admin.script')

  </body>
</html>