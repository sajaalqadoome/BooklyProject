@extends('admin.layout.master')

@section('title', 'Table Page')

@section('css')
    <!-- Custom styles for this page -->
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Book-Tables</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>image</th>
                            <th>Book_Name</th>
                            <th>Authoris</th>
                            <th>Price</th>
                            <th>quntity</th>
                            <th>Category </th>
                            <th>Action</th>
                        </tr>
                    </thead>
             
                    <tbody>
  @foreach( $books as $book )
@php
    $categoryNames = [
        1 => 'Technology', 2 => 'Religious', 3 => 'Novels', 4 => 'Children',
        5 => 'Academic', 6 => 'Cultural', 7 => 'Historical', 8 => 'Political'
    ];
@endphp
<tr>
    <td>{{ $book->id }}</td>
   <td>
    @if($book->image)
    <img src="{{ asset('images/books/'.$book->image) }}"alt="{{ $book->title }}"width="50"  height="50"class="rounded">
   @else
   <span class="text-muted">Not found</span>
   @endif
   </td>
    <td>{{$book->title  }}</td>
    <td>{{ $book->author }}</td>
    <td>{{ $book->price }}</td>
     <td>{{ $book->stock }}</td>
<td>
<span class="badge badge-info">
{{ $categoryNames[$book->category_id] ?? 'Other' }}
</span>
</td>

<td>
    <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-primary btn-sm">Edit</a>
        <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            
        <button type="submit" class="btn btn-danger btn-sm"
        onclick="return confirm('Are you Sure ?')">
            
        Delete</button>
        </form>
    </td>
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
