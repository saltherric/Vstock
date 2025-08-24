@extends('layouts.app')
@section('title')
    Create roles
@endsection
@section('page_title')
    Create roles
@endsection
@section('content')
<p class="my-1">
    <a href="{{route('role.index')}}" class="btn btn-success btn-sm">
        <i class="fas fa-reply"></i> Back
    </a>
</p>
   <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    @component('coms.alert')
                    @endcomponent 
                    <form action="{{route('role.store')}}" method="post">
                        @csrf 
                        <div class="form-group">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required value="{{old('name')}}">
                            <div class="mt-2">
                                <a href="{{route('role.index')}}" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Cancel</a>
                                <button class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> 
@endsection