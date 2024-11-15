@extends('admin.layout.layout')
@section('admin_page_title')
    Category Create - Admin Panel
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Category</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{route('store.cat')}}" method="post">
                        @csrf
                        <label for="category_name" class="fw-bold" >Category Name</label>
                       <input 
                       type="text" 
                       class="form-control @error('category_name') is-invalid  @enderror " 
                       name="category_name" 
                       placeholder="Category">

                       @error('category_name')
                          <div class="alert alert-danger">{{ $message }}</div>
                       @enderror
                       <button type="submit" class="btn btn-primary my-3" >Add Category</button>
                    </form>

                </div>
            </div>


        </div>


    </div>
@endsection
