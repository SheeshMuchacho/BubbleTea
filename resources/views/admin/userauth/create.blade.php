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
                <h3 class="page-title">Create Users</h3>

                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Navigation</li>
                        <li class="breadcrumb-item active">Users</li>
                        <li class="breadcrumb-item">Create</li>
                    </ol>
                </nav>
            </div>

            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

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

                            <form action="{{url('usercreate')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" name="name" required>
                                </div>

                                <div class="form-group" style="margin: 40px 0;">
                                    <label for="email">Email</label>
                                    <input name="email" class="form-control" required>
                                </div>

                                <div class="form-group" style="margin: 40px 0;">
                                    <label for="phone">Phone</label>
                                    <input name="phone" class="form-control" required>
                                </div>

                                <div class="form-group" style="margin: 40px 0;">
                                    <label for="address">Address</label>
                                    <input name="address" class="form-control" required>
                                </div>

                                <div class="form-group" style="margin: 40px 0;">
                                    <label for="password">Password</label>
                                    <input type="password" style="background-color: #2A3038" name="password" class="form-control" required>
                                </div>

                                <div class="form-group" style="margin: 40px 0;">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" style="background-color: #2A3038" name="password_confirmation" class="form-control" required>
                                </div>

                                <input type="hidden" name="usertype" value="0">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


@include('admin.script')

</body>
</html>
