@extends('admin.layout.default')
@section('title', 'List Staff')
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
                            <th>Email</th>
                            <th>Created</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($employers as $employer)
                            <tr>
                                <td class="serial">{{ $employer->id }}</td>
                                <td> {{ $employer->name }} </td>
                                <td><span class="name">{{ $employer->email }}</span> </td>
                                <td><span class="count">{{ $employer->created_at }}</span></td>
                                <td>
                                    <a href="{{ route('update_staff', $employer->id) }}" class="btn btn-outline-success">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $employers->links('admin.modules.pagination') }}
            </div> <!-- /.table-stats -->
        </div>
    </div>
</div>
@endsection