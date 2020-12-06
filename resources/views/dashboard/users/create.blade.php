@extends('layouts.dashboard.app')



@section('title', $title)



@section('page-header')
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="page-icon">
                        <i class="icon-laptop_windows"></i>
                    </div>
                    <div class="page-title">
                        <h5>{{ $title }}</h5>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="right-actions">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">@lang('site.home')</a></li>
                            <li class="breadcrumb-item"><a href="{{route('dashboard.users.index')}}">@lang('site.users')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('site.add')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')


    <div class="col-md-8 mx-auto">

        {!! Form::open(['route' => ['dashboard.users.store']]) !!}


        <div class="card">
            <div class="card-header">{{ $title }}</div>
            <div class="card-body">

               
                    <div class="form-group">
                        <label class="required">@lang('site.name')</label>
                        {!! Form::text('name',old('name'),['class' => 'form-control required','placeholder' => trans('site.name')]) !!}
                        @error('name')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="required">@lang('site.email')</label>
                        {!! Form::email('email',old('email'),['class' => 'form-control required','placeholder' => trans('site.email')]) !!}
                        @error('email')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>

             



                    <div class="form-group">
                        {!! Form::label(trans('site.password')) !!}
                        {!! Form::password('password',['class' => 'form-control','placeholder' => trans('site.password')]) !!}
                        @error('password')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        {!! Form::label(trans('site.password_confirmation')) !!}
                        {!! Form::password('password_confirmation',['class' => 'form-control','placeholder' => trans('site.password_confirmation')]) !!}
                        @error('password_confirmation')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>@lang('site.roles')</label>
                         <select
                         name="roles[]"
                         class="form-control"
                         multiple
                         
                         >
                        
                         @foreach ( $rolesChoices as $role )
                             <option
                            {{ (collect(old('roles'))->contains($role->id)) ? 'selected':'' }}
                             value="{{ $role->id }}">{{ $role->name }}</option>
                         @endforeach
                        
                        </select>

                        @error('roles')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                <div style="text-align: right">
                    <a href="{{ route('dashboard.users.index') }}" class="btn btn-primary">@lang('site.cancel')</a>
                    <button type="submit" class="btn btn-secondary">@lang('site.save')</button>
                </div>


            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop

