@extends('layouts.app')
@section('title')
    Users
@endsection
@section('page_title')
    Edit user
@endsection
@section('content')
@section('css')
    <link rel="stylesheet" href="{{asset('/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/plugins/select2/css/select2.min.css')}}">
@endsection
<p class="my-1">
    <a href="{{route('user.index')}}" class="btn btn-success btn-sm">
        <i class="fas fa-reply"></i> Back
    </a>
</p>
    <div class="card">
        <div class="card-body"> 
            @component('coms.alert')
            @endcomponent     
                  {{-- use enctype for adding photos --}}
            <form action="{{route('user.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3">Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" required
                                value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email"
                                value="{{$user->email}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="language" class="col-sm-3">Language</label>
                            <div class="col-sm-9">
                                <div class="icheck-success d-inline mr-3">
                                    <input type="radio" name="language" id="en" value="en" {{$user->language=='en' ? 'checked' : ''}}>
                                    <label for="en">
                                    English
                                    </label>
                                </div>
                                <div class="icheck-success d-inline">
                                    <input type="radio" name="language" id="km" value="km" {{$user->language=='km' ? 'checked' : ''}}>
                                    <label for="km">
                                    ភាសាខ្មែរ
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role_id" class="col-sm-3">Role</label>
                            <div class="col-sm-9">
                                <select name="role_id" id="role_id" class="form-control select2">
                                    @foreach ($roles as $r) {
                                        <option value="{{$r->id}}" {{$user->role_id==$r->id ? 'selected':''}}>
                                            {{$r->name}}</option>
                                    }
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-3">Username</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="username" name="username" disabled
                                value="{{$user->username}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" >
                                <small>Keep it blank to use the old password!</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="photo" class="col-sm-3">Photo</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*"
                                onchange="preview(event)">
                                <div class="mt-2">
                                    <img src="{{asset($user->photo)}}" alt="" id="img" width="150">
                                </div>
                                <div class="mt-2">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fas fa-save"> Save</i>
                                    </button>
                                    <a href="{{route('user.index')}}" class="btn btn-danger btn-sm">
                                        <i class="fas fa-times"> Cancel</i> 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div> 
@endsection
@section('js')
<script src="{{asset('/plugins/select2/js/select2.full.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
    function preview(event)
    {
        var img = document.getElementById('img');
        img.src = URL.createObjectURL(event.target.files[0])
    }
</script>
@endsection