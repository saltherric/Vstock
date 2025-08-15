@extends('layouts.app')
@section('title')
    Categories
@endsection
@section('page_title')
    Categories
@endsection
@section('content')
<p class="my-1">
    <a href="{{ route('category.create')}}" class="btn btn-success btn-sm">
        <i class="fas fa-plus-circle"></i> Create
    </a>
</p>
   <div class="card">
        <div class="card-body">
            @component('coms.alert')
            @endcomponent
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
                                <a href="{{route('category.edit', $cat->id)}}" class="btn btn-success btn-xs mr-1" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="{{route('category.delete', $cat->id)}}" class="btn btn-danger btn-xs" title="Delete" onclick="return confirm('You want to delete?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> 
@endsection