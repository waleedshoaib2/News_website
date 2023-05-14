<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>

<body>
    <h1>Post Article</h1>
    <form action="{{ route('article.create') }}" method="post">
        @csrf
        <label for="title">Title</label>
        <input type="text" id="title" name="title">

        <br>
        <br>

        <label for="image">Image Link: </label>
        <input type="text" id="image" name="image">
        <br>
        <br>
        <label for="content">Content: </label>
        <input type="text" id="content" name="content">
        <br>
        <br>

        <label for="user_id">User ID: </label>
        <input type="number" id="user_id" name="user_id">
        <br>
        <br>
        <label for="category_id">Category ID: </label>
        <input type="number" id="category_id" name="category_id">
        <br>
        <br>
        <input type="submit" value="Post">
    </form>

</body>

</html>
