@extends('layouts.app')
@section('title')
    Categories
@endsection
@section('page_title')
    Categories
@endsection
@section('content')
   <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($i=1)
                    @foreach ($cats as $cat)
                       <tr>
                            <td>{{$i++}}</td>
                            <td>{{$cat->name}}</td>
                            <td>
                                <a href="#" class="btn btn-success btn-xs" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="#" class="btn btn-danger btn-xs" title="Delete"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> 
@endsection