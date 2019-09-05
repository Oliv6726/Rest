@extends('admin.layout.default')
<style>
.scrollbar {
  overflow-y: scroll;
  overflow-x: hidden;
  z-index: 10;
  align-items: center;

}
.img {
  width: 80px;
  height: 80px;

}
</style>
@section('title', 'Orders')
@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Order</strong>
        </div>
        <div class="col-lg-1 py-2 ">
            <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#orderModal">Add Order</button>
        </div>
        @include('admin.includes.messages')

        <div class="card-body card-block pt-0 px-left-0">
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>Order ID</th>
                            <th>Ordered</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!-- /.table-stats -->
        </div>
    </div>
</div>

<div class="modal fade bd-modal-lg" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
            <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Create Order</strong>
                        </div>
                        <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @include('admin.includes.messages')
                            <div class="card-body card-block">
                                @csrf 
                                <div class="row">
                                    <div class="col-3 scrollbar" style="border-style:solid; width:200px; height: 450px;">
                                        <div>
                                            @foreach ($categories as $category)
                                                <div>
                                                    <hr>
                                                        <img class="img" src="data:image/png;base64,{{ chunk_split(base64_encode($category->category_picture))}}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-9" style="border-style:solid; height: 450px;">
                                        <div>
                                            @foreach ($categories as $category)
                                                @foreach ($category as $category->category_items)
                                                    <p>{{$category->category_items}}</p>
                                                @endforeach
                                            @endforeach
                                        </div>
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
</div>
@endsection


<!--
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
            </select>
        </div>
    </div>
    --> 