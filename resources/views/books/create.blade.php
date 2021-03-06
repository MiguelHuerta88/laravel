@extends('master')
@section('title', 'Creating a new book to Add to our store')
@section('content')
    <!-- our code here -->

    <div class="jumbotron">
        <h1>Create Book Record.</h1>
    </div>

    @if(count($errors) > 0)
        <!-- we have some errors -->
        <div class="alert alert-danger" role="alert">
            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
            There are validation errors

            {{-- loop through errors --}}
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <ol class="breadcrumb">
        <li><a href="{{route('books.index')}}" class="active">Home</a></li>
    </ol>
    <div class="row col-lg-12">
        <!-- form here -->
        <form action="{{route('books.store')}}" method="POST">

            {{ csrf_field() }}

            <div class="input-group @if($errors->has('name')) has-error @endif">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
            </div>

            <div class="input-group @if($errors->has('author')) has-error @endif">
                <label>Author</label>
                <input type="text" name="author" class="form-control" placeholder="Author" value="{{ old('author') }}">
            </div>

            <div class="input-group @if($errors->has('description')) has-error @endif">
                <label>Description</label>
                <textarea class="form-control" name="description" rows="3" cols="20">{{ old('description') }}</textarea>
            </div>

            <div class="input-group @if($errors->has('year_released')) has-error @endif">
                <label>Year Release</label>
                <input type="text" name="year_released" class="form-control" placeholder="Year Release" value="{{ old('year_released') }}">
            </div>

            <br>
                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- end -->
    </div>
@endsection