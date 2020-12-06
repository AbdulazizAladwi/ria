@extends('layouts.dashboard.app')


@section('title', __('site.edit_clients'))

@section('page-header')
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="page-icon">
                        <i class="icon-laptop_windows"></i>
                    </div>
                    <div class="page-title">
                        <h5>@lang('site.edit_clients')</h5>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="right-actions">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">@lang('site.home')</a></li>
                            <li class="breadcrumb-item"><a href="{{route('dashboard.clients.index')}}">@lang('site.clients')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('site.edit')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div>
        @livewire('client.create-update-client',['client' => $client])
    </div>
@stop



