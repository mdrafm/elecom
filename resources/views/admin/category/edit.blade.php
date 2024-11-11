@extends('admin.layout.layout')
@section('admin_page_title')
    Category Edit - Admin Panel
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Category</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{route('update.cat',$category_info->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <label for="category_name" class="fw-bold" >Category Name</label>
                       <input 
                       type="text" 
                       class="form-control @error('category_name') is-invalid  @enderror " 
                       name="category_name" 
                       value="{{$category_info->category_name}}"
                       placeholder="Category">

                       @error('category_name')
                          <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                       <button type="submit" class="btn btn-primary my-3" >Update Category</button>
                    </form>

                </div>
            </div>


        </div>


    </div>
@endsection
