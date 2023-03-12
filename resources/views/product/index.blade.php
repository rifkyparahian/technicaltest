    @extends('layouts.app')

    @section('title', 'Data Product')

    @section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-header">
                        <div class="card-tools pull-right">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal"><i
                                    class="fa fa-plus"></i> Add</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Produk</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                @endphp
                                @foreach ($products as $product)
                                    <tr>
                                        <td width="30">{{ $counter++ }}</td>
                                        <td>{{ $product->nama }}</td>
                                        <td>{{ $product->deskripsi }}</td>
                                        <td>{{ $product->harga }}</td>
                                        <td>{{ $product->category->nama }}</td>
                                        <td><img src="/images/products/{{ $product->gambar }}" alt=""
                                                width="50px"></td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#editModal{{ $product->id }}"><i
                                                    class="far fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#deleteModal{{ $product->id }}"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="editModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Tambah Produk</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('products.update') }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    {{-- @method('PUT') --}}
                                                    @csrf
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                                        <div class="form-group">
                                                            <label for="name">Nama Produk</label>
                                                            <input type="text" class="form-control" name="nama"
                                                                id="name" placeholder="Nama Produk"
                                                                value="{{ $product->nama }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description">Deskripsi Produk</label>
                                                            <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Produk" required>{{ $product->deskripsi }}</textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="price">Harga</label>
                                                            <input type="number" class="form-control" name="harga"
                                                                value="{{ $product->harga }}" placeholder="Harga" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="category">Kategori</label>
                                                            <select class="form-control" name="category_id" required>
                                                                <option value="">Pilih Kategori</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}"
                                                                        @if ($category->id == $product->category_id) selected="selected" @endif>
                                                                        {{ $category->nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <img src="/images/products/{{ $product->gambar }}" width="70"
                                                            alt="">
                                                        <div class="form-group">
                                                            <label for="image">Upload Gambar</label>
                                                            <input type="file" class="form-control-file" name="gambar"
                                                                value="{{ $product->gambar }}" accept="image/*">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Hapus Kategori</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('products.delete') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <p>Apakah anda yakin menghapus data ini?</p>
                                                        <input type="text" name="id" value="{{ $product->id }}"
                                                            hidden>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Tambah Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('products.addProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nama Produk</label>
                                <input type="text" class="form-control" name="nama" id="name"
                                    placeholder="Nama Produk" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi Produk</label>
                                <textarea class="form-control" name="deskripsi" id="description" placeholder="Deskripsi Produk" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Harga</label>
                                <input type="number" class="form-control" name="harga" id="price"
                                    placeholder="Harga" required>
                            </div>
                            <div class="form-group">
                                <label for="category">Kategori</label>
                                <select class="form-control select2" name="category_id" id="category" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Upload Gambar</label>
                                <input type="file" class="form-control-file" name="gambar" id="image"
                                    accept="image/*">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- /.row -->
        <!-- jQuery -->
        <script src="/lte/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables  & Plugins -->
        <script src="/lte/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="/lte/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
        <script src="/lte/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
        <script src="/lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
        <script src="/lte/plugins/jszip/jszip.min.js"></script>
        <script src="/lte/plugins/pdfmake/pdfmake.min.js"></script>
        <script src="/lte/plugins/pdfmake/vfs_fonts.js"></script>
        <script src="/lte/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
        <script src="/lte/plugins/datatables-buttons/js/buttons.print.min.js"></script>
        <script src="/lte/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
        <!-- Select2 -->
        <script src="/lte/plugins/select2/js/select2.full.min.js"></script>
        <!-- AdminLTE App -->
        <script src="/lte/dist/js/adminlte.min.js"></script>
        <!-- Page specific script -->
        <script>
            $(function() {
                $("#example1").DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                }).container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
            $('.select2').select2({
                dropdownParent: $('#addModal'),
                width: '100%'
            });
        </script>
    @endsection
