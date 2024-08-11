<!DOCTYPE html>
<html>
  <head> 
   @include("admin.admincss")

   
  </head>
  <body>
   @include("admin.adminsidebar")
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

            <div>
            <h1 >Update Category</h1>
          <div class="div_deg" >
            
            <form action="{{url('update_category',$data->id)}}" method="post" >
                @csrf
                <input type="text" name="category"
                value="{{$data->category_name}}">
                <input class="btn-btn-primary"type="submit" value="Update">
            </form>
</div>
            
         </div>
           
                    
              
</div>
</div>
   
  </body>
</html>