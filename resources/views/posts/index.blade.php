@extends('layouts.posts')
@section('title', 'List of post')
@section('navigation')
    <ul>
        <li>Home</li>
        <li>About</li>
        <li>Contact</li>
        <li>Gallery</li>
    </ul>
@endsection
@section('content')
@component('components.message', ['title'=>'<span>Component Title</span>'])
    This is a slot message
@endcomponent
<ul>
    <?php foreach($data as $key => $value){ ?>
        <li><?php echo $value['name'].' - '.$value['company']; ?></li>
    <?php } ?>

</ul>
@endsection
