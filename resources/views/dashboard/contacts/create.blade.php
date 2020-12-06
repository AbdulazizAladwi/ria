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
                            <li class="breadcrumb-item"><a href="{{route('dashboard.contacts.index')}}">@lang('site.contacts')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('site.add')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')


    <div class="col-md-10 mx-auto">
        @if ( is_null($client) )

            {!! Form::open(['route' => ['dashboard.contacts.store']]) !!}

        @else

            {!! Form::open(['route' => ['dashboard.contacts.store',['client' => $client->id]]]) !!}

        @endif
        <div class="card">
            <div class="card-header">{{ $title }}</div>
            <div class="card-body">

                <div class="form-row">
                    @if ( is_null($client) )
                        <div class="form-group col-md-6">
                            <label class="required">@lang('site.client')</label>
                            {!! Form::select('client_id',$clientChoices,old('client_id'),['class' => 'form-control required','placeholder' => trans('site.select_client')]) !!}
                            @error('client_id')
                            <p class="text-danger mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                    @else
                        <div class="form-group col-md-6">
                            {!! Form::label(trans('site.client')) !!}
                           <h5>{{ $client->name }}</h5>

                        </div>
                    @endif

                    <div class="form-group col-md-6">

                    </div>

                </div>



                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="required">@lang('site.name')</label>
                        {!! Form::text('name',old('name'),['class' => 'form-control required','placeholder' => trans('site.name')]) !!}
                        @error('name')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="required">@lang('site.email1')</label>
                        {!! Form::email('email1',old('email1'),['class' => 'form-control required','placeholder' => trans('site.email1')]) !!}
                        @error('email1')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>


                <div class="form-row">

                    <div class="form-group col-md-6">
                        {!! Form::label(trans('site.email2')) !!}
                        {!! Form::email('email2',old('email2'),['class' => 'form-control','placeholder' => trans('site.email2')]) !!}
                        @error('email2')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        {!! Form::label(trans('site.phone1')) !!}
                        {!! Form::text('phone1',old('phone1'),['class' => 'form-control','placeholder' => trans('site.phone1')]) !!}
                        @error('phone1')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        {!! Form::label(trans('site.phone2')) !!}
                        {!! Form::text('phone2',old('phone2'),['class' => 'form-control','placeholder' => trans('site.phone2')]) !!}
                        @error('phone2')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label(trans('site.job_title')) !!}
                        {!! Form::text('job_title',old('job_title'),['class' => 'form-control','placeholder' => trans('site.job_title')]) !!}
                        @error('job_title')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <div class="form-row">


                    <div class="form-group col-md-6">
                        {!! Form::label(trans('site.client_relation')) !!}
                        {!! Form::text('client_relation',old('client_relation'),['class' => 'form-control','placeholder' => trans('site.client_relation')]) !!}
                        @error('client_relation')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        {!! Form::label(trans('site.gender')) !!}
                        {!! Form::select('gender',$genderChoices,old('gender'),['class' => 'form-control','placeholder' => trans('site.select_gender')]) !!}
                        @error('gender')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group col-md-6">
                        {!! Form::label(trans('site.instagram')) !!}
                        {!! Form::url('instagram',old('instagram'),['class' => 'form-control','placeholder' => trans('site.instagram')]) !!}
                        @error('instagram')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label(trans('site.facebook')) !!}
                        {!! Form::url('facebook',old('facebook'),['class' => 'form-control','placeholder' => trans('site.facebook')]) !!}
                        @error('facebook')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        {!! Form::label(trans('site.twitter')) !!}
                        {!! Form::url('twitter',old('twitter'),['class' => 'form-control','placeholder' => trans('site.twitter')]) !!}
                        @error('twitter')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        {!! Form::label(trans('site.snapchat')) !!}
                        {!! Form::url('snapchat',old('snapchat'),['class' => 'form-control','placeholder' => trans('site.snapchat')]) !!}
                        @error('snapchat')
                        <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div style="text-align: right">
                    <a href="{{ route('dashboard.contacts.index') }}" class="btn btn-primary">@lang('site.cancel')</a>
                    <button type="submit" class="btn btn-secondary">@lang('site.add_contact')</button>
                </div>


            </div>
        </div>
        {!! Form::close() !!}
    </div>
@stop

