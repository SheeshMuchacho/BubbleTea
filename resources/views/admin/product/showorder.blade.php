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
                <h3 class="page-title">Show Customer Orders</h3>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Navigation</li>
                        <li class="breadcrumb-item">Order</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">


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

                                <table class="table table-striped">
                                    <thead>
                                    <th>Customer Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Product Title</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th style="text-align: center">Status</th>
                                    <th style="text-align: center">Delete</th>
                                    </thead>

                                    @foreach($order as $orders)

                                        <tbody>
                                        <td style="color: white">{{$orders->name}}</td>
                                        <td style="color: white; max-width: 600px; overflow-wrap: break-word;">{{$orders->phone}}</td>
                                        <td style="color: white">{{$orders->address}}</td>
                                        <td style="color: white">{{$orders->product_name}}</td>
                                        <td style="color: white">{{$orders->price}}</td>
                                        <td style="color: white">{{$orders->quantity}}</td>
                                        <td style="text-align: center">
                                            @if($orders->status === 'not delivered')
                                                <a class="btn btn-inverse-success" href="{{ url('updatestatus', $orders->id) }}">
                                                    Deliver
                                                </a>
                                            @else
                                                <a class="btn btn-inverse-dark">
                                                    Delivered
                                                </a>
                                            @endif
                                        </td>
                                        <td style="text-align: center">
                                            <a
                                                class="btn btn-inverse-danger"
                                                onclick="return confirm('Are you sure you want to delete order?')"
                                                href="{{ url('deleteorder', $orders->id) }}">
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


@include('admin.script')

</body>
</html>
