@extends('layouts.dashboard.app')



@section('title', $title)



@section('page-header')
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="page-icon">
                        <i class="icon-file-text2"></i>
                    </div>
                    <div class="page-title">
                        <h5>{{ $title }}</h5>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="right-actions">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">@lang('site.home')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('site.activity-report')</li>
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
            @livewire('report.activity-report')
        </div>
    </div>
@stop








