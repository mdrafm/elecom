@extends('admin.layout.layout')
@section()
    Category Create - Admin Panel
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Category</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <label for="category_name" class="fw-bold" >Category Name</label>
                       <input type="text" class="form-control" placeholder="Category">
                    </form>

                </div>
            </div>


        </div>


    </div>
@endsection
