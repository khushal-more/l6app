@extends('layouts.posts')
@section('title', 'Create New Post')
@section('content')
<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="">
    @csrf
    @method('POST')
    <input type="text" name="title" value="{{ old('title') }}" placeholder="Title"><br>
    @error('title')
        <p>{{$message}}</p>
    @enderror
    <input type="password" name="password" value="" placeholder="Password"><br>
    <input type="password" name="password_confirmation" value="" placeholder="Confirm Password"><br>
    @if($errors->has('password'))
        @foreach ($errors->get('password') as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <textarea name="content" id="fd" cols="30" rows="10"></textarea><br>
    @if($errors->has('content'))
        @foreach ($errors->get('content') as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <lable>SCI<input type="checkbox" name="check[]" value="SCI"></lable>
    <lable>COMM<input type="checkbox" name="check[]" value="COMM"></lable>
    <lable>ARTS<input type="checkbox" name="check[]" value="ARTS"></lable>
    @if($errors->has('check'))
        @foreach ($errors->get('check') as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <br>
    <input type="file" name="photo" id="">
    @if($errors->has('photo'))
        @foreach ($errors->get('photo') as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <br>

    <label for="">Select Start Date: <input type="date" name="start_date" id=""></label>
    @if($errors->has('start_date'))
        @foreach ($errors->get('start_date') as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <br>

    <label for="">Select End Date: <input type="date" name="end_date" id=""></label>
    @if($errors->has('end_date'))
        @foreach ($errors->get('end_date') as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <br>

    <label for="">URL: <input type="url" name="website" id=""></label>
    @if($errors->has('website'))
        @foreach ($errors->get('website') as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <br>

     <label for="">Accept TOS: <input type="checkbox" name="tos" id="" value="1"></label>
    @if($errors->has('tos'))
        @foreach ($errors->get('tos') as $error)
            <p>{{ $error }}</p>
        @endforeach
    @endif
    <br>
    <input type="submit" value="Add New Post">
</form>
@endsection
