@extends('admin.layout.default')
@section('title', 'All categories')
@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Current categories</strong>
        </div>
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
                                    <a href="{{ route('update_cat', $category->id) }}" class="btn btn-outline-success">Edit</a>
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
        </div>
    </div>
</div>
@endsection