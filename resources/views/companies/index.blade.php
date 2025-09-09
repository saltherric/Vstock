@extends('layouts.app')
@section('title')
    Company
@endsection
@section('page_title')
    Company
@endsection
@section('content')
<p class="my-1">
    <a href="{{route('company.edit')}}" class="btn btn-success btn-sm">
        <i class="fas fa-edit"></i> Edit
    </a>
</p>
   <div class="card">
        <div class="card-body">
            @component('coms.alert')
            @endcomponent
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="name" class="col-sm-3">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="name" disabled value="{{$com->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-3">Phone</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="phone" id="phone" disabled value="{{$com->phone}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="email" disabled value="{{$com->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="website" class="col-sm-3">Website</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="website" id="website" disabled value="{{$com->website}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-3">Address</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="address" id="address" disabled value="{{$com->address}}">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group row">
                        <label for="description" class="col-sm-3">Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" id="description" rows="2" class="form-control" >{{$com->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-sm-3">Photo</label>
                        <div class="col-sm-9">
                            <img src="{{asset($com->logo)}}" alt="" width="150" id="logo">
                        </div>
                    </div>
                </div>
            </div>
            <iframe 
                src="{{asset($com->map)}}"
                width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div> 
    </div>
@endsection