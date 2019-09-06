@extends('admin.layout.default')
@section('title', 'Edit menu')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Edit: {{ $menu[0]->menu_name }}</strong>
        </div>
        <div class="card-body card-block">
            @include('admin.includes.messages')
            <form action="{{ route('update_menu', $menu[0]->menu_id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                    <div class="card-body card-block">
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="menu-name" class=" form-control-label">Menu name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="menu-name" name="menu-name" placeholder="{{ $menu[0]->menu_name }}" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="description-input" class=" form-control-label">Description</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="description-name" id="description-input" rows="9" placeholder="{{ $menu[0]->menu_desc }}" class="form-control"></textarea>
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
                                        <option value="{{$product->product_id}}"> {{ $product->product_name }} </option>
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
                                <div class="col-12" style="text-align: right;">
                                    <input type="submit" name="submit" value="Add category" class="btn btn-dark">
                                </div>
                    </div>
            </form>
        </div>
    </div>
</div>

@endsection