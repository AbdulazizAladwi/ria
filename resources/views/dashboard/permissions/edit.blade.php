@extends('layouts.dashboard.app')


@section('title', __('site.edit_permissions'))

@section('page-header')
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="page-icon">
                        <i class="icon-laptop_windows"></i>
                    </div>
                    <div class="page-title">
                        <h5>@lang('site.edit_permissions')  - {{$role->name}}</h5>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="right-actions">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">@lang('site.home')</a></li>
                            <li class="breadcrumb-item"><a href="{{route('dashboard.permissions.index')}}">@lang('site.roles_permissions')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('site.edit')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-10  mx-auto">
            <div class="card">
                <div class="card-header">
                    @lang('site.edit')
                </div>

                <div class="card-body">
                    <form action="{{route('dashboard.permissions.update', $role)}}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="">Role Name</label>
                                <input type="text" name="role" value="{{$role->name}}" class="form-control">
                                @error('role') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>


                        <div class="row">
                            @foreach($permissions as $permission)

                                <div class="col-md-3" style="margin-top:10px">
                                    <input type="checkbox" {{$role->permissions->contains($permission->id) ? 'checked' : ''}} name="permissions[]" value="{{$permission->id}}"><label for="">{{$permission->name}}</label><br>
                                </div>
                            @endforeach
                            @error('permissions') <span class="error text-danger">{{ $message }}</span> @enderror

                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary " style="margin-top: 20px">@lang('site.update')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

