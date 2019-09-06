@extends('admin.layout.default')
@section('title', 'Create category')
@section('content')

<div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Current categories</strong>
            </div>
            <div class="col-lg-1 py-2 ">
                    <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#categoryModal">Add category</button>
                </div>
                @include('admin.includes.messages')

            <div class="card-body card-block">
                <div class="table-stats order-table ov-h">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th>Name</th>
                                <th>Items</th>
                                <th>Date</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td class="serial">{{ $category->id }}</td>
                                    <td><span class="name">{{ $category->category_name }}</span> </td>
                                    <td><span class="product">{{ str_limit($category->category_items, $limit = 20, $end = '...') }}</span> </td>
                                    <td><span class="count">{{ $category->created_at }}</span></td>
                                    <td>
                                        <a href="{{ route('edit_cat', $category->category_id) }}" class="btn btn-outline-success">Edit</a>
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('delete_cat', $category->category_id) }}" class="btn btn-outline-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links('admin.modules.pagination') }}
                </div> <!-- /.table-stats -->
                <div class="modal-edit">
                </div>
            </div>
        </div>
    </div>  
    
<div class="modal fade" id="categoryModal" 
     tabindex="-3" role="dialog" 
     aria-labelledby="ingredientModalLable">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" 
          data-dismiss="modal" 
          aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" 
        id="ingredientModalLable">Add menu</h4> 
      </div>
      <div class="modal-body">
            <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Create Category</strong>
                        </div>
                        <form action="{{ route('add_cat') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                            @include('admin.includes.messages')
                            <div class="card-body card-block">
                            @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="category-name" class=" form-control-label">Category name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="category-name" name="category-name" placeholder="Veggies..." class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="select" class=" form-control-label">Category items</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="category-items[]" id="multiple-select" multiple="" style="height 500%;" class="form-control">
                                            @foreach ($products as $product)
                                                <option value="{{$product->product_id}}"> {{ $product->product_name }} </option> 
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="category-picture" class="form-control-label">Category picture</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="category-picture" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-12" style="text-align: right;">
                                    <input type="submit" name="submit" value="Add category" class="btn btn-dark">
                                </div>
                            </div>
                            
                        <form>
                    </div>
                </div>

      </div>

    </div>
  </div>
</div> 







<script>
function clearfields(){
    $('#category-name').val = 2;
    return;
}
</script>
@endsection
@section('scripts')

@endsection