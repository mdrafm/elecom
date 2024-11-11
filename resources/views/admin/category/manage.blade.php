@extends('admin.layout.layout')
@section('admin_page_title')
    Category Manage - Admin Panel
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Manage Category</h5>
                </div>
                <div class="card-body">
                    @if (session('message'))
                      <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                   <table class="table table-responsive " >
                      <thead>
                        <tr>
                            <th>Sl No</th>
                            <th>Category</th>
                            <th>action</th>
                       </tr>
                      </thead>
                      <tbody>
                        @foreach ($catagories as $cat )
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>{{$cat->category_name}}</td>
                                <td>
                                    <a href="{{route('show.cat', $cat->id)}}" class="btn btn-info" > Edit </a>
                                     <form action="{{route('delete.cat', $cat->id)}}" method="POST">
                                       @csrf
                                       @method('DELETE')
                                       <input type="submit" value="Delete" class="btn btn-danger" >
                                     </form>
                                </td>
                            </tr>
                        @endforeach
                      </tbody>
                   </table>

                </div>
            </div>


        </div>


    </div>
@endsection
