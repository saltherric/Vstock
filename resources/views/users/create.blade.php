@extends('layouts.app')
@section('title')
    Users
@endsection
@section('page_title')
    Create user
@endsection
@section('content')
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
            <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="name" class="col-sm-3">Name <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" required
                                value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" name="email"
                                value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="language" class="col-sm-3">Language</label>
                            <div class="col-sm-9">
                                <select name="language" id="language" class="form-control">
                                    <option value="en">English</option>
                                    <option value="km">ភាសាខ្មែរ</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role_id" class="col-sm-3">Role</label>
                            <div class="col-sm-9">
                                <select name="role_id" id="role_id" class="form-control">
                                    @foreach ($roles as $r) {
                                        <option value="{{$r->id}}">{{$r->name}}</option>
                                    }
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-3">Username <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="username" name="username" required
                                value="{{old('username')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3">Password <span class="text-danger">*</span></label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <label for="photo" class="col-sm-3">Photo</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
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