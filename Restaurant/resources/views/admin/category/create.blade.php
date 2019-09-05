@extends('admin.layout.default')
@section('title', 'Create category')
@section('content')
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
                        <select name="category-items" id="multiple-select" multiple="" class="form-control">
                            <option value="1">Option #1</option>
                            <option value="2">Option #2</option>
                            <option value="3">Option #3</option>
                            <option value="4">Option #4</option>
                            <option value="5">Option #5</option>
                            <option value="6">Option #6</option>
                            <option value="7">Option #7</option>
                            <option value="8">Option #8</option>
                            <option value="9">Option #9</option>
                            <option value="10">Option #10</option>
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
        <button onclick="clearfields();">Test</button>
    </div>
</div>
<script>
function clearfields(){
    $('#category-name').val = 2;
    return;
}
</script>
@endsection