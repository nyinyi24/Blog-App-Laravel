<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello {{$subscriber->name}}</h1>
    <h1>Blog title - {{$comment->blog->title}}</h1>
    <h1>Comment body - {{$comment->body}}</h1>
    <h1>Comment author - {{$comment->author->name}}</h1>
</body>
</html>