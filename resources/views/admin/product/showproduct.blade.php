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
              <h3 class="page-title">View Products</h3>

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item active">Navigation</li>
                  <li class="breadcrumb-item active">Product</li>
                  <li class="breadcrumb-item">View Products</li>
                </ol>
              </nav>
            </div>

            <div class="row">
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">


            <div style="padding: 20px 50px 20px 50px">

                @if (session('error'))
                    <div class="alert alert-danger">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session('error') }}
                    </div>
                @endif

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <table class="table table-striped">
                    <thead>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th style="text-align: center">Update</th>
                        <th style="text-align: center">Delete</th>
                    </thead>

                    @foreach($data as $product)

                    <tbody>
                        <td style="color: white">{{$product->title}}</td>
                        <td style="color: white; max-width: 600px; overflow-wrap: break-word;" class="description-cell">{{$product->description}}</td>
                        <td style="color: white">{{$product->quantity}}</td>
                        <td style="color: white">{{$product->price}}</td>
                        <td class="py-1"> <img class="prdctimg" src="/productimage/{{$product->image}}" style="height: 60px; width: 60px"> </td>
                        <td style="text-align: center"><a class="btn btn-inverse-primary" href="{{url('updateview', $product->id)}}">Update</a></td>
                        <td style="text-align: center">
                            <a
                                class="btn btn-inverse-danger"
                                onclick="return confirm('Are you sure you want to delete product?')"
                                href="{{url('deleteproduct', $product->id)}}">
                                Delete
                            </a>
                        </td>
                    </tbody>

                    @endforeach
                </table>


                </div>
              </div>
            </div>
            </div>
          </div>
         </div>
        </div>


          <!-- partial -->

          <script>
            // Get all description cells
            const descriptionCells = document.querySelectorAll('.description-cell');

            // Iterate over each description cell
            descriptionCells.forEach(cell => {
                // Check if the content exceeds the width of the cell
                if (cell.scrollWidth > cell.clientWidth) {
                    // Apply CSS white-space property to break words and wrap text
                    cell.style.whiteSpace = 'pre-wrap';
                    // Add padding to the top and bottom of the cell
                    cell.style.paddingTop = '5px'; // Adjust the value as needed
                    cell.style.paddingBottom = '5px'; // Adjust the value as needed
                }
            });
        </script>

          @include('admin.script')

  </body>
</html>
