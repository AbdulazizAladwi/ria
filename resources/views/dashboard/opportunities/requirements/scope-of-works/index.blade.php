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
                            <li class="breadcrumb-item"><a href="{{route('dashboard.opportunities.index')}}">@lang('site.opportunities')</a></li>
                            <li class="breadcrumb-item"><a href="{{route('dashboard.opportunities.show', ['opportunity' => $opportunity->id, 'requirement_id'=> $requirement->id])}}">@lang('site.details')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('site.scope_of_works')</li>
                        </ol>
                    </div>
                </div>

            </div>
        </div>
    </header>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @livewire('opportunity.requirements.scope-of-work.table', ['opportunity' => $opportunity, 'requirement' => $requirement])
        </div>
    </div>
@stop
