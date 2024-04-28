<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
      @vite('resources/css/app.css')

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
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Best Offer</h4>
            <h2>New Flavors On Menu</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Tasty Deals</h4>
            <h2>Get your Favourite Drinks</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Last Minute</h4>
            <h2>Grab Drinks on the Go</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->





    {{-- Displaying Products --}}

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="">view all products <i class="fa fa-angle-right"></i></a>

              {{-- Search Function --}}
              <form action="{{url('search')}}" method="get" class="form-inline" style="padding: 20px 0;">

                @csrf
                      <input class="form-control" type="search" name="search" placeholder="Search products"
                              style="width: 30%; font-size: 14px;">
                      <input type="submit" value="Search" class="btn btn-success"
                              style="font-size: 11px; padding: 10px 15px; margin: 0 10px; background-color: #0a0a0a">

              </form>

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


                  <form action="{{ url('addcart', ['id' => $Product->id]) }}" method="POST">
                      @csrf

                      <label>
                          <input class="form-input w-16 px-3 py-2 border rounded-md mr-2" type="number" value="1" min="1" name="quantity">
                      </label>

                      <input class="custombtn bg-red-500 hover:bg-red-600 text-whitesmoke hover:text-whitesmoke px-3 py-2 rounded-md cursor-pointer transition duration-200" type="submit" value="Add to Cart">
                      </form>


              </div>
            </div>
          </div>

          @endforeach

          <!-- Pagination Links Container -->
          <div class="container">
            <div class="pagination-links">
            @if(method_exists($data, 'links'))
                    {!! $data->links() !!}
            @endif
            </div>
          </div>


        </div>
      </div>
    </div>



    {{-- Rest of the Body --}}

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>About Bubble Me Bubble Tea</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>Looking for a refreshing drink?</h4>
              <p>Bubble tea, also known as boba tea, is a popular and refreshing beverage that originated in Taiwan in the 1980s. This unique drink has gained widespread popularity
                globally, offering a delightful combination of tea, milk, or fruit flavors, and chewy tapioca pearls known as "boba."</p>
              <ul class="featured-list">
                <li><a href="#">Tea Base: Black, green, fruit, or milk teas</a></li>
                <li><a href="#">Flavors: Jasmine, taro, matcha, and various fruit options</a></li>
                <li><a href="#">Toppings: Fruit jellies, aloe vera, flavored syrups, tapioca pearls</a></li>
                <li><a href="#">Customization: Adjustable sweetness, ice level, and toppings</a></li>
                <li><a href="#">Texture Experience: Smooth liquid combined with chewiness</a></li>
              </ul>
              <a href="" class="filled-button">Read More</a>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/feature-image.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>Creative &amp; Unique <em>Tea</em> Flavors</h4>
                  <p>Sip into Bliss: Indulge in the delightful fusion of flavors and textures with our signature bubble tea. Your taste buds deserve this sweet escape! 🍵✨ #BubbleTeaBliss</p>
                </div>
                <div class="col-md-4">
                  <a href="#" class="filled-button">Purchase Now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>





    @include('user.footer')




    @include('user.script')





  </body>

</html>
