@extends('layouts.app')
@section('title')
    Users
@endsection
@section('page_title')
    Users
@endsection
@section('content')
<p class="my-1">
    <a href="{{route('user.create')}}" class="btn btn-success btn-sm">
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
                        <th>#</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Language</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($i=1)
                    @forelse ($users as $user)
                       <tr>
                            <td>{{$i++}}</td>
                            <td>{{$user->name}}</td>
                            <td>
                                <a href="{{route('user.edit', $user->id)}}" class="btn btn-success btn-xs mr-1" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="{{route('user.delete', $user->id)}}" class="btn btn-danger btn-xs" title="Delete" onclick="return confirm('You want to delete?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr> 
                    @empty
                        <tr>
                            <td colspan="8">
                                Users not found!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> 
@endsection