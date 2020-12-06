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
                            <li class="breadcrumb-item"><a href="{{route('dashboard.opportunities.show', $opportunity->id)}}">@lang('site.details')</a></li>
                            <li class="breadcrumb-item"><a href="{{route('dashboard.scope-of-works.index', ['opportunity_id' => $opportunity->id, 'requirement_id' => $requirement_id])}}">@lang('site.scope_of_works')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('site.show')</li>
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
            <div class="card-header" style="text-align: center">{{ $sow->client['name'] ." " . trans('site.version') ." " . $sow['created_at']}}</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <h5 for="" style="font-weight: bold" class="mb-2">@lang('site.summary')</h5>
                        <div class="form-row mb-3">
                            {!!  $sow->features !!}
                        </div>





                        <h5 for="" style="font-weight: bold" class="mb-2">@lang('site.opportunity_details')</h5>
                        <div class="form-row mb-1">
                            <div class="col-md-6">
                                <span>@lang('site.opportunity_name') :</span>
                                <div style="display: inline-block">{{$opportunity->name}}</div>
                            </div>

                            <div class="col-md-6">
                                <span>@lang('site.current_stage') :</span>
                                <div style="display: inline-block">{{$opportunity->stages()[$opportunity->stage]}}</div>
                            </div>
                        </div>

                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <span>@lang('site.current_status') : </span>
                                <div style="display: inline-block">{{$opportunity->getStatus()[$opportunity->status] ?? '-'}}</div>

                            </div>
                        </div>

                        <div class="form-row mb-2">
                            <h5 for="" style="font-weight: bold">@lang('site.client_details')</h5>

                        </div>
                        <div class="form-row mb-1">
                            <div class="col-md-6">
                                <span>@lang('site.client_name') : {{$sow->client['name']}}</span>
                            </div>
                            <div class="col-md-6">
                                <span>@lang('site.street_address') : {{$sow->client->address->street ?? '-'}}</span>
                            </div>
                        </div>


                        <div class="form-row mb-3">
                            <div class="col-md-6">
                                <span>@lang('site.phone') : {{$sow->client['phone1']}}</span>
                            </div>
                            <div class="col-md-6">
                                <span>@lang('site.city_zip_code') : {{$sow->client->address->zip_code ?? '-' }}</span>
                            </div>
                        </div>

                        <div class="form-row mb-2">
                            <span for="" style="font-weight: bold">@lang('site.date') : </span>
                            <p>{{$sow->date}}</p>
                        </div>


                        <div class="form-row mb-2">
                            <div class="col-md-3">
                                <span>@lang('site.deliverables')</span>
                            </div>

                            <div class="col-md-4">
                                @foreach($sow->deliverables as $deliverable)
                                    <div>
                                        {{\App\Models\Deliverable::deliverables()[$deliverable]}}
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="form-row mb-4">
                            <div class="col-md-3">
                                <span>@lang('site.technologies')</span>
                            </div>

                            <div class="col-md-4">
                                @foreach($sow->technologies as $technology)
                                    <div>
                                        {{\App\Models\Technology::technologies()[$technology]}}
                                    </div>
                                @endforeach
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="col-md-3">
                                <span>@lang('site.timeline')</span>
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
                                    @foreach($sow->resources as $resource)
                                        <tr>
                                            <td>{{$resource->name}}</td>
                                            <td>{{$resource->pivot->estimation}} {{ $resource->estimationTypeString() }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>



                        <a href="{{route('dashboard.scope-of-works.index', ['requirement_id' => $requirement_id, 'opportunity_id' =>$opportunity->id])}}" class="btn btn-primary btn-sm">@lang('site.back')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop
