@extends('master')
@section('title', 'Viewing A Book')
@section('content')
    <!-- our code here -->
    <ol class="breadcrumb">
        <li><a href="{{route('books.index')}}" class="active">Home</a></li>
    </ol>
    <div class="jumbotron">
        <h1>Showing {{ $book->name }}</h1>
        <p>
            <strong>Author:</strong>{{ $book->author }}<br>
            <strong>Description:</strong>{{ $book->description }}<br>
            <strong>Year Release:</strong>{{ $book->year_released }}
        </p>
    </div>
@endsection