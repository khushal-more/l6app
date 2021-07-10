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
<h2>Listing data</h2>
    <ul>
        <?php foreach($data as $key => $value){ ?>
            <li><?php echo $value['name'].' - '.$value['company']; ?></li>
        <?php } ?>

    </ul>
</body>
</html>
