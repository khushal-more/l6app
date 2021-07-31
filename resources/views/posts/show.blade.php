@extends('layouts.posts')
@section('title', 'Show Record')
@section('content')
<ul>
    <li>{{$data['name']}} - {{$data['age']}}</li>
</ul>
@endsection
