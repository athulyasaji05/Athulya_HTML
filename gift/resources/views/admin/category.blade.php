<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category - Online Shopping</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 16px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            width: 40%;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .table_deg
        {
            text-align: center;
            marin: auto;
            border: 2px solid yellowgreen;
            margin-top: 50px;
            width: 400px;
        }
        th
        {
            background-color: skyblue;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            color: blue;
        }
        td
        {
            color: black;
            padding: 10x;
            border: 1px solid skyblue;
        }

    </style>
</head>
<body>

<div class="container">
    <h1>ADD CATEGORY</h1>
    <form action="{{url('add_category')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="category-name">Category Name</label>
            <input type="text" id="category-name" name="categoryname" required>
        </div>
        <button type="submit" class="btn">ADD</button>
    </form>
</div>

<div>
    <table class="table_deg">
        <tr> 
            <th>Category Name</th>
            <th>Delete</th>
            <th>Edit</th>
    </tr>
    @foreach($data as $data)
    <tr>
        <td>{{$data->category_name}}</td>
        <td>
                <a class="btn btn-success" href="{{ url('edit_category', $data->id) }}">Edit</a>
            </td>
            <td>
                <a class="btn btn-danger" href="{{ url('delete_category', $data->id) }}">Delete</a>
            </td>
    </tr>
    @endforeach
    </table>
    </div>

</body>
</html>
