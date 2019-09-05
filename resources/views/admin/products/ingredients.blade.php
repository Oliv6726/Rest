@extends('admin.layout.default') 
@section('content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Ingredients</strong>
        </div>
        <div class="col-lg-1 py-2 ">
            <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#ingredientModal">Add ingredient</button>
        </div>
        @include('admin.includes.messages')

        <div class="card-body card-block pt-0 px-left-0">
            <div class="table-stats order-table ov-h">
                <table class="table ">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>Name</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ingredients as $ingredient)
                            <tr>
                                <td class="serial">{{ $ingredient->ingredient_id }}</td>
                                <td contentEditable="true"> {{ $ingredient->ingredient_name }} </td>
                                <td>
                                    <a href="{{ route('delete_ingredient', $ingredient->ingredient_id) }}" class="btn btn-outline-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-stats -->
        </div>
    </div>
</div>

<!-- Modal-->

<div class="modal fade" id="ingredientModal" tabindex="-3" role="dialog" aria-labelledby="ingredientModalLable">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ingredientModalLable">Add Ingredient</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('add_ingredient') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                  @include('admin.includes.messages')
                      @csrf
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="ingredients-name" class=" form-control-label">Name</label>
                        </div>
                        <div class="col col-md-9">
                            <input type="text" id="ingredients-name" name="ingredients-name" placeholder="Beef" class="form-control" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <span class="pull-right">
                    <input type="submit" name="submit" value="Add ingredient" class="btn btn-dark">
                </span>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection