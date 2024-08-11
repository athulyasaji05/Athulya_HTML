<!DOCTYPE html>
<html>
<head>
    @include("admin.admincss")

    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        h1 {
            color: white;
            text-align: center; /* Center-align the header */
            margin-bottom: 20px; /* Space below the header */
        }

        form {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 600px; /* Limit form width */
            padding: 20px;
            background-color: #333; /* Background color for contrast */
            border-radius: 8px; /* Rounded corners for the form */
        }

        label {
            display: block;
            width: 100%; /* Make labels take full width */
            font-size: 18px;
            color: white;
            margin-bottom: 8px; /* Space between label and input */
        }

        input[type='text'],
        input[type='number'],
        textarea,
        select {
            width: calc(100% - 20px); /* Full width minus padding */
            padding: 10px;
            margin-bottom: 15px; /* Space between form fields */
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        textarea {
            height: 80px;
        }

        .input_deg {
            margin-bottom: 20px; /* Space between form groups */
        }
    </style>
</head>
<body>
    @include("admin.adminheader")
   
    @include("admin.adminsidebar")

    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
            <h1>Add Product</h1>
                <div class="div_deg">
                    <form action="{{url('upload_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="input_deg">
                            <label for="title">Product Title</label>
                            <input type="text" id="title" name="title" required>
                        </div>
                        <div class="input_deg">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" required></textarea>
                        </div>
                        <div class="input_deg">
                            <label for="price">Price</label>
                            <input type="text" id="price" name="price">
                        </div>
                        <div class="input_deg">
                            <label for="qty">Quantity</label>
                            <input type="number" id="qty" name="qty">
                        </div>
                        <div class="input_deg">
                            <label for="category">Product Category</label>
                            <select id="category" name="category">
                                <option>Select a option</option>
                                @foreach($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach
                              
                            </select>
                        </div>
                        <div class="input_deg">
                            <label for="image">Product Image</label>
                            <input type="file" id="image" name="image">
                        </div>
                        <div class="input_deg">
                        <input class="btn btn-success" type="submit" value="Add Product">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
