@extends('master')
@section('title', 'Viewing All Books in the Store')
@section('content')
<!-- our code here -->

<div class="jumbotron">
    <h1>Welcome to The Book Store.</h1>
</div>

<ol class="breadcrumb">
    <li><a href="{{route('books.index')}}" class="active">Home</a></li>
    <li><a href="{{route('books.create')}}">Add Book</a></li>
</ol>

<!-- flash message -->
@if(Session::has('message'))
    <div class="success alert-success" role="success">
        {{ Session::get('message') }}
    </div>
@endif
<!-- end -->
    <!-- list the books we have -->
    <table class="table table-stripped">
        <tbody>
        <tr>
            <!--<th>Id</th>-->
            <th>Name</th>
            <th>Author</th>
            <th>Description</th>
            <th>Year Released</th>
            <th>View</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($books as $book)
            <tr>
                <!--<td>{{ $book->id }}</td>-->
                <td>{{ $book->name }}</td>
                <td>{{ $book->author }}</td>
                <td> {{$book->description}}</td>
                <td>{{$book->year_released}}</td>
                <td><a href="{{ route('books.view', ['id' => $book->id]) }}">View</a></td>
                <td><a href="{{ route('books.edit', ['id' => $book->id]) }}">Edit</a></td>
                <td>
                    <form action="{{ route('books.delete', ['id' => $book->id]) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-primary">Delete</button>

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection