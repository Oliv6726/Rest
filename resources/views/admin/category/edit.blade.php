@extends('admin.layout.default')
@section('title', 'Edit category')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Edit: {{ $categories[0]->category_name }}</strong>
        </div>
        <div class="card-body card-block">
            @include('admin.includes.messages')
            <form action="{{ route('update_cat', $categories[0]->category_id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="category-name" class=" form-control-label">Category name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="category-name" name="category-name" placeholder="{{ $categories[0]->category_name }}" class="form-control" required>
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
                                <div class="col-12" style="text-align: right;">
                                    <input type="submit" name="submit" value="Add category" class="btn btn-dark">
                                </div>
                            </div>

                </div>
            </form>
        </div>
    </div>
</div>

@endsection