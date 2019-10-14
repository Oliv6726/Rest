@extends('admin.layout.default')
@section('custom_style')
<link rel="stylesheet" href="{{ asset('css/custom/order-style.css') }}">
@endsection
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
                            <th>Products</th>
                            <th>Table number</th>
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
                        <div class="order-item">
                            <p class="text-header">
                            <p class="text-description">
                        </div>
                        <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        @include('admin.includes.messages')
                            <div class="card-body card-block">
                                @csrf 
                                <div class="row">
                                    <div class="col-3 border scrollbar" style="width:200px; height: 450px;">
                                        @foreach ($categories as $category)
                                            <div class="all_orders">
                                                <hr>
                                                <a id="add_order" href="javascript:void(0)">
                                                    <p name="{{ $category->category_name }}">{{$category->category_name}}</p>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-9 border scrollbar" style="height: 450px;">
                                        <div>
                                            <div class="row row-items">
                                            </div>
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

@section('scripts')
<script src="{{ asset('js/custom/order-add.js') }}"></script>
<script>
    $(".card").on('click', '.cardItem', function(){
        $(this).hasClass('selectedItem') ? $(this).attr("class", "card-body cardItem") : $(this).attr("class", $(this).attr("class") + " selectedItem");
    });
</script>
@endsection
