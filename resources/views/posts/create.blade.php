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
    <?php if($errors->any()): ?>
        <ul>
            <?php foreach($errors->all() as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="<?php echo route('posts.store') ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="">
        @csrf
        <input type="text" name="title" value="<?php echo old('title') ?>"><br>
        <?php if($errors->has('title')): ?>
            <?php foreach ($errors->get('title') as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <textarea name="content" id="fd" cols="30" rows="10"></textarea><br>
        <?php if($errors->has('content')): ?>
            <?php foreach ($errors->get('content') as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <lable>SCI<input type="checkbox" name="check[]" value="SCI"></lable>
        <lable>COMM<input type="checkbox" name="check[]" value="COMM"></lable>
        <lable>ARTS<input type="checkbox" name="check[]" value="ARTS"></lable>
        <?php if($errors->has('check')): ?>
            <?php foreach ($errors->get('check') as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <br>
        <input type="file" name="photo" id="">
        <?php if($errors->has('photo')): ?>
            <?php foreach ($errors->get('photo') as $error): ?>
                <p><?php echo $error; ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
        <br>
        <input type="submit" value="Add New Post">
    </form>
</body>
</html>
