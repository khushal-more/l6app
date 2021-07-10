<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Create Form</h2>
    <form action="<?php echo route('posts.create') ?>" method="get">
        <input type="hidden" name="">
        @csrf
        <input type="text" name="title" value="<?php echo old('title') ?>"><br>
        <textarea name="content" id="fd" cols="30" rows="10"></textarea><br>
        <lable>SCI<input type="checkbox" name="check[]" value="SCI"></lable>
        <lable>COMM<input type="checkbox" name="check[]" value="COMM"></lable>
        <lable>ARTS<input type="checkbox" name="check[]" value="ARTS"></lable>
        <br>
        <input type="submit" value="Add New Post">
    </form>
</body>
</html>
