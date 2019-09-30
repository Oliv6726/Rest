@extends('admin.layout.default')
@section('title', 'Edit staff')
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Edit: {{ $user[0]->name }}</strong>
        </div>
        <div class="card-body card-block">
            @include('admin.includes.messages')
            <form action="{{ route('update_staff', $user[0]->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="category-name" class=" form-control-label">User email</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="category-name" name="category-name" placeholder="{{ $user[0]->name }}" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="category-picture" class="form-control-label">Reset password</label>
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