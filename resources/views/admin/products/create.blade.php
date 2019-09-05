@extends('admin.layout.default')
@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Product</strong>
        </div>
        <div class="col-lg-1 py-2 ">
            <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#productModal">Add Product</button>
        </div>
        @include('admin.includes.messages')

        <div class="card-body card-block pt-0 px-left-0">
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>Product Name</th>
                            <th>Ingredients</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td class="serial" >{{ $product->product_id }}</td>
                                <td id="Name-{{ $product->product_name }}"> {{ $product->product_name }} </td>
                                <td id="ingredients-{{ $product->product_ingredients }}"> {{ $product->product_ingredients }} </td>
                                <td>
                                        <a href="" class="btn btn-outline-danger" id="edit-{{ $product->product_name }}">Edit</a>
                                    </td>
                                <td>
                                    <a href="{{ route('delete_product', $product->product_id) }}" class="btn btn-outline-danger" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-stats -->
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="productModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Create product</strong>
                        </div>
                        <form action="{{ route('add_prod') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @include('admin.includes.messages')
                            <div class="card-body card-block">
                            @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="product-name" class=" form-control-label">Product name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="product-name" name="product-name" placeholder="Beef wellington..." class="form-control" required>
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
                                        <label for="select" class=" form-control-label">Ingredients</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="ingredients-items[]" id="multiple-select" multiple="" style="height 500%;" class="form-control">
                                            @foreach($ingredients as $ingredient)
                                                <option value="{{$ingredient->ingredient_id}}"> {{ $ingredient->ingredient_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="product-picture" class="form-control-label">Product picture</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="file" id="file-input" name="product-picture" class="form-control-file">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="col-12" style="text-align: right;">
                                    <input type="submit" name="submit" value="Add Product" class="btn btn-dark">
                                </div>
                            </div>
                            
                        <form>
                    </div>
                </div>
    </div>
  </div>
</div>
@endsection

