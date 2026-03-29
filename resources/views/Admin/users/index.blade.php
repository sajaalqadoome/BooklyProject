@extends('admin.layout.master')

@section('title', 'Table Page')

@section('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Information-User</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
 <thead>
 <tr>
<th>id</th>
<th>Name</th>
<th>email</th>
<th>phone</th>
<th>created_at</th>
<th>is_admin</th>                
</tr>
</thead>
   
                    <tbody>
@foreach ( $users as $user )
<tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
<td>{{ $user->phone ?? 'not found' }}</td>
    <td>{{$user->created_at->format('Y-m-d')  }}</td>
    <td>{{ $user->is_admin }}</td>
</tr>
@endforeach
</tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection
