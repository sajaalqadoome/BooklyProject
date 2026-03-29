@extends('User.layouts.master')

@section('title', 'Read: ' . $book->title)

@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <div class="pdf-viewer" style="height: 100vh;">
                <iframe src="{{ asset('pdfs/books/' . $book->pdf_file) }}" 
                        width="100%" 
                        height="100%" 
                        style="border: none;">
                </iframe>
            </div>
        </div>
    </div>
</div>
@endsection