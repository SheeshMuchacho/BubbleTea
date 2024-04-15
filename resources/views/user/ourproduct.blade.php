<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HomePage</title>

    <!-- Bootstrap core CSS -->
    
    @include("user.css")

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->



    @include("user.navbar")



    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>bubblicious</h4>
              <h2>our products</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                  <li class="active" data-filter="*">All Products</li>
                  <li data-filter=".des">Featured</li>
                  <li data-filter=".dev">Flash Deals</li>
                  <li data-filter=".gra">Last Minute</li>
              </ul>

              {{-- Search Fuction --}}
              <div class="col-md-12">
                <form action="{{url('ourproduct')}}" method="get" class="form-inline" style="padding: 20px 0;">
    
                  @csrf
                        <input class="form-control" type="search" name="search" placeholder="Search products"
                                style="width: 30%; font-size: 14px;">
                        <input type="submit" value="Search" class="btn btn-success"
                                style="font-size: 11px; padding: 10px 15px; margin: 0 10px; background-color: #0a0a0a">
    
                </form>
            </div>


            </div>
          </div>
        
        
                @foreach($data as $Product)
        
                <div class="col-md-4">
                  <div class="product-item">
                      <div class="image-container">
                    <a href="#"><img src="/productimage/{{$Product->image}}"></a>
                      </div>
                    <div class="down-content">
                      <a href="#"><h4>{{$Product->title}}</h4></a>
                      <h6>LKR {{$Product->price}}</h6>
                      <p>{{$Product->description}}</p>
        
                      <a class="custombtn" href="#">Add to Cart</a>
        
                    </div>
                  </div>
                </div>
        
                @endforeach
        
                @if(method_exists($data, 'links'))
                <div class="d-flex justify-content-center">
        
                  {!! $data->links() !!}
        
                </div>
                @endif
        
        
            </div>
        </div>
    </div>



    

    @include("user.footer")





    @include('user.script')



    

  </body>

</html>