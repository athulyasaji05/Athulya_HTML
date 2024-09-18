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
        .table_deg {
            border: 2px solid greenyellow;
            width: 100%; /* Ensures the table takes full width */
            border-collapse: collapse; /* Removes gaps between borders */
        }
        th {
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding: 15px; /* Adjusted padding for better appearance */
            text-align: center;
        }
        td {
            border: 1px solid skyblue;
            text-align: center;
            padding: 10px; /* Added padding for consistency */
        }
        input[type='search']
        {
            width: 500px;
            height: 60px;
            margin-left: 50px;
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
                <form action="{{url('product_search')}}" method="get">
                    @csrf
                    <input type="search" name="search">
                    <input type="submit" class="btn btn-secondary" value="Search">                
                </form>
                <div class="div_deg">
                    <table class="table_deg">
                        <thead>
                            <tr>
                                <th>Product Title</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $products)
                            <tr>
                                <td>{{ $products->title }}</td>
                                <td>{{ $products->description }}</td>
                                <td>{{ $products->category }}</td>
                                <td>{{ $products->price }}</td>
                                <td>{{ $products->quantity }}</td>
                                <td>
                                    
                                    @if($products->image)
                                        <img src="products/{{$products->image}}" alt="Product Image" style="width: 100px; height: auto;">
                                    @endif
                                </td>
                                <td>
                                <a class="btn btn-success" href="{{ url('update_product',$products->id) }}">Edit</a>
    </td>


                                <td>
                                    <a class="btn btn-danger"  href="{{url('delete_product',$products->id)}}">Delete</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    
</body>
</html>
