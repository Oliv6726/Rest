@extends('admin.layout.default')
@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Menus</strong>
        </div>
        <div class="col-lg-1 py-2 ">
            <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#ingredientModal">Add Menu</button>
        </div>
        @include('admin.includes.messages')
        <div class="card-body card-block pt-0 px-left-0">
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>Menu name</th>
                            <th>Products included</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($menus as $menu)
                            <tr>
                                <td class="serial">{{ $menu->menu_id }}</td>
                                <td> {{ $menu->menu_name }} </td>
                                <td> {{ $menu->menu_items }} </td>
                                <td>
                                        <a href="{{ route('edit_menu', $menu->menu_id) }}" class="btn btn-outline-success">Edit</a>
                                    </td>
                                <td>
                                    <a href="" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- /.table-stats -->
        </div>
    </div>
</div>

<!-- Modal-->

<div class="modal fade" id="ingredientModal" 
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
            <form action="{{route('add_menu')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @include('admin.includes.messages')
                    <div class="card-body card-block">
                    @csrf
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="menu-name" class=" form-control-label">Menu name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="menu-name" name="menu-name" placeholder="Beef Menu" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="description-input" class=" form-control-label">Description</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="description-name" id="description-input" rows="9" placeholder="Description..." class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="select" class=" form-control-label">Product</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="product-items[]" id="multiple-select" multiple="" style="height 500%;" class="form-control">
                                    <option value="null">-- Products -- </option>
                                    @foreach($products as $product)
                                        <option value="{{$product->product_name}}"> {{ $product->product_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="menu-picture" class="form-control-label">Menu picture</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="file" id="file-input" name="menu-picture" class="form-control-file">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    
                    <div class="modal-footer">
                            <button type="button" 
                               class="btn btn-default" 
                               data-dismiss="modal">Close</button>
                            <span class="pull-right">
                                    <input type="submit" name="submit" value="Add Menu" class="btn btn-dark">
                            </span>
                          </div>
                        </div>
                <form>
      </div>

    </div>
  </div>
</div>
@endsection
