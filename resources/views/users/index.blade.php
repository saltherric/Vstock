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
<?php 
    $langs = [
        'en' => 'English',
        'km' => 'ភាសាខ្មែរ'
    ];
?>
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
                            <td>
                                <img src="{{asset($user->photo)}}" alt="" width="30">
                            </td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->language}} - {{$langs[$user->language]}}</td>
                            <td>
                                <a href="{{route('user.edit', $user->id)}}" class="btn btn-success btn-xs mr-1" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="{{route('user.delete', $user->id)}}" class="btn btn-danger btn-xs mr-1" title="Delete" onclick="return confirm('You want to delete?')"><i class="fas fa-trash"></i></a>
                                <a href="#reset" data-toggle="modal" class="btn btn-warning btn-xs" title="Change Password" 
                                    onclick="chPassword('{{$user->id}}')"><i class="fas fa-key"></i></a>
                            </td>
                        </tr> 
                    @empty
                        <tr>
                            <td colspan="8">
                                No record found!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div> 

    {{-- modal --}}
    <div class="modal fade" id="reset">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{route('user.change_password')}}" method="POST">
                @csrf
                <input type="hidden" id="user_id" name="user_id">
                <div class="modal-header bg-primary">
                    <strong class="modal-title">Change Password</strong>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="password">New Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary btn-sm">Update</button>
                </div>
            </form>
          </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    function chPassword(id) {
        document.getElementById('user_id').value=id;
    }
</script>
@endsection