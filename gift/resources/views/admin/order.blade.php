<!DOCTYPE html>
<html>
  <head> 
    @include("admin.admincss")
    <style>
      table {
          width: 100%; /* Full width */
          border-collapse: collapse; /* Remove double borders */
          margin-top: 20px; /* Add space above the table */
      }

      th, td {
          border: 1px solid #ddd; /* Light border for all cells */
          padding: 12px 15px; /* Padding inside cells */
          text-align: left; /* Align text to the left */
      }

      th {
          background-color: #4CAF50; /* Green header background */
          color: white; /* White text in the header */
          font-weight: bold; /* Bold header text */
          text-align: center; /* Center the text in header */
      }

      td {
          background-color: #f9f9f9; /* Light background for table rows */
      }

      tr:nth-child(even) {
          background-color: #f2f2f2; /* Alternate row color */
      }

      tr:hover {
          background-color: #ddd; /* Hover effect for rows */
      }

      img {
          width: 100px; /* Set image width */
          height: auto; /* Maintain aspect ratio */
          border-radius: 8px; /* Rounded corners for images */
      }
    </style>
  </head>
  <body>
    @include("admin.adminheader")
    @include("admin.adminsidebar")
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
          <!-- Table content -->
          <table>
            <tr>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Product Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Status</th>
                <th>Change Status</th>
            </tr>
            @foreach($data as $data)
            <tr>
                <td>{{$data->name}}</td>
                <td>{{$data->rec_address}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->product->title}}</td>
                <td>{{$data->product->price}}</td>
                <td>
                    <img width="150" src="products/{{$data->product->image}}">
                </td>
                <td>{{$data->status}}</td>
                <td>
                    <a class="btn btn-primary" href="{{url('on_the_way',$data->id)}}">On the way</a>
                    <a class="btn btn-success" href="{{url('delivered',$data->id)}}">Delivered</a>
                </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
