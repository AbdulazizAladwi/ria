@extends('layouts.dashboard.app')
@section('title', __('site.costing'))
@section('page-header')
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="page-icon">
                        <i class="icon-credit-card"></i>
                    </div>
                    <div class="page-title">
                        <h5>@lang('site.costing')</h5>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="right-actions">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">@lang('site.home')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('site.viewCosting')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @endsection
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <div class="card">
        <div class="card-header" style="text-align: center">{{ $proposal->client['name']}}</div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-12">
                        <h5 for="" style="font-weight: bold" class="mb-2">@lang('site.summary')</h5>

                        <div class="form-row mb-5">
                            <div class="col-md-4">
                                <div style="display: inline-block">{!! $proposal->features !!}</div>
                            </div>
                        </div>
<div class="col-md-12">
    <h5 for="" style="font-weight: bold" class="mb-2">@lang('site.opportunity_details')</h5>
        <div class="form-row mb-2">
            <div class="col-md-4">
                <span>@lang('site.opportunity_name') :</span>
        <div style="display: inline-block">{{$opportunity->name}}</div>
        </div>
<div class="col-md-4">
    <span>@lang('site.current_stage') :</span>
        <div style="display: inline-block">{{$opportunity->stages()[$opportunity->stage]}}</div>
        </div>
    </div>
<div class="form-row mb-5">
<div class="col-md-4">
    <span>@lang('site.current_status') : {{$opportunity->status ?? '-'}} </span>
<div style="display: inline-block">{{$opportunity->getStatus()[$opportunity->status] ?? ''}}</div>
</div>
</div>
<div class="form-row mb-1">
    <h5 for="" style="font-weight: bold">@lang('site.client_details')</h5>
</div>
<div class="form-row mb-1">
<div class="col-md-4">
    <span>@lang('site.client_name') : {{$proposal->client['name']}}</span>
</div>
<div class="col-md-4">
    <span>@lang('site.street_address') : {{$proposal->client->address->street ?? '-'}}</span>
</div>
</div>
<div class="form-row mb-5">
<div class="col-md-4">
    <span>@lang('site.phone') : {{$proposal->client['phone1']}}</span>
</div>
<div class="col-md-4">
    <span>@lang('site.city_zip_code') : {{$proposal->client->address->zip_code ?? '-'}}</span>
</div>
</div>
<div class="form-row mb-2">
<div class="col-md-4">
    <span>@lang('site.date') :</span>
</div>
<div class="col-md-4">
    <p>{{$proposal->date->format('d M Y')}}</p>
</div>
</div>
<div class="form-row mb-4">
<div class="col-md-4">
<span>@lang('site.deliverables') :</span>
</div>
<div class="col-md-4">
<ul class="list-group">
@foreach($proposal->deliverables as $deliverable)
<li class="list-group-item">
    {{\App\Models\Deliverable::deliverables()[$deliverable]}}
</li>
@endforeach
</ul>
</div>
</div>
<div class="form-row mb-4">
<div class="col-md-4">
<span>@lang('site.technologies') :</span>
</div>
<div class="col-md-4">
<ul class="list-group">
@foreach($proposal->technologies as $technology)
<li class="list-group-item">
    {{\App\Models\Technology::technologies()[$technology]}}
</li>
@endforeach
    </ul>
</div>
</div>
<div class="form-row">
<div class="col-md-4">
<span>@lang('site.timeline') :</span>
</div>
<div class="col-md-4">
<table class="table border">
    <thead>
    <tr>
    <th scope="col">@lang('site.resource')</th>
    <th scope="col">@lang('site.estimation')</th>
    </tr>
</thead>
<tbody>
    @foreach($proposal->resources as $resource)
    <tr>
        <td>{{$resource->name}}</td>
        <td>{{$resource->pivot->estimation}} Days</td>
    </tr>
    @endforeach
</tbody>
</table>
</div>
</div>
<div class="form-row">
    <div class="col-md-4">
        <span>@lang('site.total_project_price') :</span>
    </div>
    <div class="col-md-4">
        <table class="table border">
            <thead>
            <tr>
                <th scope="col">@lang('site.discount')</th>
                <th scope="col">@lang('site.margin')</th>
                <th scope="col">@lang('site.totalprice')</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$proposal->cost->discount}} %</td>
                    <td>{{$proposal->cost->margin}} %</td>
                    <td>{{$proposal->cost->totalprice}} KD</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
                 </div>
            </div>
    </div>
</div>

{{--
<div style="text-align: center"><h4>{{ $proposal->client['name']}}</h4></div>
<h5><b>@lang('site.opportunity_name') :</b></h5>
<span style="display: inline-block">{{$opportunity->name}}</span><br>
<!--start of client details-->
<br>
<h5 for="" style="font-weight: bold">@lang('site.client_details')</h5>
<label>@lang('site.client_name') : </label>
<span>{{$proposal->client['name']}}</span><br>
<label>@lang('site.street_address') : </label>
<span>{{$proposal->client->address->street ?? '-'}}</span>
<br>
<label>@lang('site.phone') : </label>
<span>{{$proposal->client['phone1']}}</span><br>
<label>@lang('site.city_zip_code') : </label>
<span>{{$proposal->client->address->zip_code ?? '-'}}</span><br>
<br>
<label><b>@lang('site.date') :</b></label>
<span>{{$proposal['date']}}</span><br>
<!--end of client details-->
<br>
<label><b>@lang('site.deliverables') :</b></label>
<span class="card col-md-4">
        <ul class="list-group">
            @foreach($proposal->deliverables as $deliverable)
                <li class="list-group-item">
                    {{\App\Models\Deliverable::deliverables()[$deliverable]}}
                </li>
            @endforeach
        </ul>
</span>
<br>
<label><b>@lang('site.technologies') :</b></label>
<span class="card col-md-4">
    <ul class="list-group">
        @foreach($proposal->technologies as $technology)
            <li class="list-group-item">
            {{\App\Models\Technology::technologies()[$technology]}}
            </li>
        @endforeach
    </ul>
</span>
<br>
<label><b>@lang('site.costing') :</b></label>
<!--
    <span>
    <table class="table border">
    <thead>
    <tr>
        <th scope="col">@lang('site.resource')</th>
        <th scope="col">@lang('site.estimation')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($proposal->resources as $resource)
        <tr>
            <td>{{$resource->name}}</td>
            <td>{{$resource->pivot->estimation}} Days</td>
        </tr>
        @endforeach
    </tbody>
</table>
</span>
!-->
<span class="card col-md-5">
    <table class="table border">
    <thead>
    <tr>
        <th scope="col">@lang('site.discount')</th>
        <th scope="col">@lang('site.margin')</th>
        <th scope="col">@lang('site.totalprice')</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$proposal->cost->discount}} %</td>
            <td>{{$proposal->cost->margin}} %</td>
            <td>{{$proposal->cost->totalprice}} KD</td>
        </tr>
    </tbody>
</table>
</span>
    </div>--}}
@endsection