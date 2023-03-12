@extends('layouts.app')

@section('title', 'Data Category')

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
                                <th>Nama Kategori</th>
                                <th>Slug</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $counter = 1;
                            @endphp
                            @foreach ($categories as $category)
                                <tr>
                                    <td width="30">{{ $counter++ }}</td>
                                    <td>{{ $category->nama }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#editModal{{ $category->id }}"><i class="far fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#deleteModal{{ $category->id }}"><i
                                                class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editModal{{ $category->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Kategori</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('categories.updateCategory') }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <input type="text" name="id" value="{{ $category->id }}"
                                                            hidden>
                                                        <label for="name">Nama Kategori</label>
                                                        <input type="text" class="form-control" name="name"
                                                            id="name" placeholder="Nama Kategori"
                                                            value="{{ $category->nama }}" required>
                                                        <label for="name">Nama Slug</label>
                                                        <input type="text" class="form-control" name="slug"
                                                            value="{{ $category->slug }}" required>
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
                                <div class="modal fade" id="deleteModal{{ $category->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Hapus Kategori</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('categories.delete') }}" method="POST">
                                                @csrf
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin menghapus data ini?</p>
                                                    <input type="text" name="id" value="{{ $category->id }}"
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
                    <h5 class="modal-title" id="addModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('categories.addCategory') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input type="text" class="form-control" name="name" id="name"
                                placeholder="Nama Kategori" required>
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
    </script>
@endsection
