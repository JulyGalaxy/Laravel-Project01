<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Email noti - {{$user->name}}</h1>
    <p>Comment - {{$comment->body}}</p>
    <p>Subscribed Blog - {{$comment->blog->title}}</p>
</body>
</html>