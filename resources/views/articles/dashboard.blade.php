<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Basic styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 2rem 0;
        }

        th,
        td {
            padding: 1rem;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Button styles */
        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 5px;
            font-size: 0.9rem;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0069d9;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-add {
            margin: 1rem 0;
            float: right;
            margin-right: 680px;
        }

        .centered {
            text-align: center;
        }
    </style>
    <title>Articles Table</title>
</head>

<body>
    <div style="text-align: center;">
        <h1>Dashboard</h1>
    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Update</th>
                <th>Delete</th>
                <th>Read</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>
                        <a href="{{ route('articles.find', ['article' => $article->id]) }}"
                            class="btn btn-primary">Update</a>
                    </td>
                    <td>
                        <form action="{{ route('articles.destroy', $article->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('article.read', ['article' => $article->id]) }}"
                            class="btn btn-primary">Read</a>

                    </td>
                </tr>
            @endforeach
        </tbody>


    </table>

    <a href="{{ route('loadCreatepage') }}" class="btn btn-primary btn-add">Add Article</a>
</body>

</html>
