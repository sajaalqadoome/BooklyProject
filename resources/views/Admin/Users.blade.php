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
<th>created_at</th>
<th>is_admin</th>                
</tr>
</thead>
   
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

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
<th>created_at</th>
<th>is_admin</th>                
</tr>
</thead>
   
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

