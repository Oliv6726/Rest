@extends('admin.layout.default')
@section('title', 'Edit menu')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Edit: {{ $products[0]->product_name }}</strong>
        </div>
        <div class="card-body card-block">
            @include('admin.includes.messages')
            <form action="{{ route('update_prod', $products[0]->product_id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                                    <input type="submit" name="submit" value="Edit product" class="btn btn-dark">
                                </div>
                    </div>
                    </div>
            </form>
        </div>
    </div>
</div>

@endsection