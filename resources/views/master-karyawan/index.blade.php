@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Master Karyawan</h1>
    <a href="{{ route('master-karyawan.create') }}" class="btn btn-primary mb-2">Add New Karyawan</a>

    <form action="{{ route('master-karyawan.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="file" class="form-label">Upload File</label>
            <div class="custom-file">
                <input type="file" name="file" class="form-control-file" id="file" accept=".csv, .xlsx">
                <label class="custom-file-label" for="file">Choose file</label>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Import CSV/Excel</button>
    </form>
    <hr>
    @if (session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif

    <table id="karyawan-table" class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode NIK</th>
                <th>Nama Lengkap</th>
                <th>Jabatan</th>
                <th>Gaji Pokok</th>
                <th>Insentif</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawans as $karyawan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $karyawan->kode_nik }}</td>
                    <td>{{ $karyawan->nama_lengkap }}</td>
                    <td>{{ $karyawan->jabatan }}</td>
                    <td>{{ number_format($karyawan->gaji_pokok, 2) }}</td>
                    <td>{{ number_format($karyawan->insentif, 2) }}</td>
                    <td>
                        <a href="{{ route('master-karyawan.edit', $karyawan->kode_nik) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('master-karyawan.destroy', $karyawan->kode_nik) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('header')
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <style>
        /* Custom File Input */
        .custom-file {
            position: relative;
            display: inline-block;
            width: 100%;
        }
    
        .custom-file input[type="file"] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 100px;
            opacity: 0;
            cursor: pointer;
        }
    
        .custom-file .custom-file-label {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            cursor: pointer;
        }
    
        .custom-file input[type="file"]:focus + .custom-file-label,
        .custom-file input[type="file"]:hover + .custom-file-label {
            border-color: #80bdff;
            outline: none;
            box-shadow: inset 0 0 0 0.2rem rgba(86, 189, 254, 0.25);
        }
    
        .custom-file-label::after {
            content: "Browse";
        }
    </style>
@endsection

@section('footer')
    <!-- DataTables JS -->
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('AdminLTE-3.2.0/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script>
         $(document).ready(function () {
            $('#karyawan-table').DataTable({
                responsive: true,
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'copy',
                        className: 'btn btn-primary',
                        text: '<i class="fas fa-copy"></i> Copy'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-success',
                        text: '<i class="fas fa-file-csv"></i> CSV'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-success',
                        text: '<i class="fas fa-file-excel"></i> Excel'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-danger',
                        text: '<i class="fas fa-file-pdf"></i> PDF'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-info',
                        text: '<i class="fas fa-print"></i> Print'
                    }
                ]
            });
        });
    </script>
@endsection
