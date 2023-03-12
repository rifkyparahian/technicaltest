<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href=/lte/plugins/fontawesome-free/css/all.min.css>
    <!-- DataTables -->
    <link rel="stylesheet" href="/lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="/lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- select2 css -->
    <link rel="stylesheet" href="/lte/plugins/select2/css/select2.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="/lte/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-collapse layout-top-nav sidebar-closed ">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="container">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('title')</h1>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="col-12">
                                    <img src="/images/products/{{ $product->gambar }}" class="product-image"
                                        alt="Product Image">
                                </div>
                                <div class="col-12 product-image-thumbs">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h3 class="my-3">{{ $product->nama }}</h3>
                                <a class="my-3" href="">Kategori: {{ $product->category->nama }}</a>
                                <p>{{ $product->deskripsi }}</p>
                                <hr>
                                <div class="bg-gray py-2 px-3 mt-4">
                                    <h2 class="mb-0">
                                        Rp. {{ $product->harga }}
                                    </h2>
                                </div>
                                <div class="mt-4">
                                    <div class="btn btn-primary btn-lg btn-flat">
                                        <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                        Add to Cart
                                    </div>

                                    <div class="btn btn-default btn-lg btn-flat">
                                        <i class="fas fa-heart fa-lg mr-2"></i>
                                        Add to Wishlist
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /.card-body -->
        </div>
        <!-- /.card -->

        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
        <div class="p-3">
            <h5>Title</h5>
            <p>Sidebar content</p>
        </div>
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->


</body>

</html>
