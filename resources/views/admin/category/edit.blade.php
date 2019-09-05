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
            </form>
        </div>
    </div>
</div>

@endsection