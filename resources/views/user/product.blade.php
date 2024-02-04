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

            <form action="{{url('search')}}" method="get" class="form-inline" style="float: right; padding: 35px:0;">

              @csrf

              <input class="form-control" type="search" name="search" placeholder="search">
              <input type="submit" value="Search" class="btn btn-success">

            </form>

          </div>
        </div>


        @foreach($data as $Product)

        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="/productimage/{{$Product->image}}" alt=""></a>
            <div class="down-content">
              <a href="#"><h4>{{$Product->title}}</h4></a>
              <h6>LKR {{$Product->price}}</h6>
              <p>{{$Product->description}}</p>

              <a class="btn btn-primary" style="font-size: 13px; background-color: rgb(226, 59, 59); border-color: rgb(228, 5, 5);" href="#">Add to Cart</a>

            </div>
          </div>
        </div>

        @endforeach

        @if(method_exists($data, 'links'))
        <div class="d-flex justify-content-center">

          {!! $data->links() !!}

        </div>
        @endif


        {{-- <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="assets/images/product_01.jpg" alt=""></a>
            <div class="down-content">
              <a href="#"><h4>Brown Sugar</h4></a>
              <h6>LKR 1,200</h6>
              <p>Black tea and brown sugar are a great combination and it’s delicious when made into a bubble tea.</p>
              <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
              <span>Reviews (24)</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="assets/images/product_02.jpg" alt=""></a>
            <div class="down-content">
              <a href="#"><h4>Macha</h4></a>
              <h6>LKR 1,500</h6>
              <p>A layered drink with boba, milk, and matcha, it’s made with just 6 ingredients.</p>
              <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
              <span>Reviews (21)</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="assets/images/product_03.jpg" alt=""></a>
            <div class="down-content">
              <a href="#"><h4>Taro</h4></a>
              <h6>LKR 1,550</h6>
              <p>Taro, a root vegetable that’s naturally purple, is a very popular bubble tea flavor. It tastes nutty and sweet.</p>
              <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
              <span>Reviews (36)</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="assets/images/product_04.jpg" alt=""></a>
            <div class="down-content">
              <a href="#"><h4>Jasmine</h4></a>
              <h6>LKR 1,300</h6>
              <p>Jasmine green tea is a lightly floral and caffeinated drink. Milk, sugar, and boba are added into the drink to make it a bubble tea.</p>
              <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
              <span>Reviews (48)</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="assets/images/product_05.jpg" alt=""></a>
            <div class="down-content">
              <a href="#"><h4>Classic</h4></a>
              <h6>LKR 1,200</h6>
              <p>A classic bubble tea is made with black tea, sugar, milk, ice, and tapioca balls.</p>
              <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
              <span>Reviews (16)</span>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="assets/images/product_06.jpg" alt=""></a>
            <div class="down-content">
              <a href="#"><h4>Butterfly Pea</h4></a>
              <h6>LKR 1,700</h6>
              <p>Butterfly pea flower tea, water, brown sugar, tapioca balls, half & half, ice.</p>
              <ul class="stars">
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
                <li><i class="fa fa-star"></i></li>
              </ul>
              <span>Reviews (32)</span>
            </div>
          </div>
        </div> --}}


      </div>
    </div>
  </div>