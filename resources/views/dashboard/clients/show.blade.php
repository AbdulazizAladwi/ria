@extends('layouts.dashboard.app')


@section('title', __('site.client_details'))

@section('page-header')
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="page-icon">
                        <i class="icon-laptop_windows"></i>
                    </div>
                    <div class="page-title">
                        <h5>@lang('site.client_details')</h5>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="right-actions">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('dashboard.home')}}">@lang('site.home')</a></li>
                            <li class="breadcrumb-item"><a href="{{route('dashboard.clients.index')}}">@lang('site.clients')</a></li>
                            <li class="breadcrumb-item active" aria-current="page">@lang('site.show')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </header>
@endsection

@section('content')
    <div>
        <div class="col-md-10 mx-auto">
            <div class="card">
                <div class="card-header">@lang('site.client_details')</div>
                <div class="card-body">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">@lang('site.name')</label>
                            <input type="text" name="name" value="{{$client->name}}" disabled placeholder="@lang('site.name')" class="form-control">
                            @error('name')
                            <p style="color: #ae1c17">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">Type</label>
                            <select class="form-control" name="type_id" disabled id="">
                                <option>{{$client->type->name}}</option>
                            </select>
                            @error('type')
                            <p style="color: #ae1c17">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">@lang('site.phone1')</label>

                            <input type="number" name="phone1" disabled value="{{$client->phone1}}" placeholder="@lang('site.phone1')" class="form-control">
                            @error('phone1')
                            <p style="color: #ae1c17">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">@lang('site.phone2')</label>
                            <input type="number" name="phone2" disabled value="{{$client->phone2}}" placeholder="@lang('site.phone2')" class="form-control">
                            @error('phone2')
                            <p style="color: #ae1c17">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">@lang('site.phone_extension')</label>
                            <input type="number" name="phone_extension" disabled value="{{$client->phone_extension}}" placeholder="@lang('site.phone_extension')" class="form-control">
                            @error('phone_extension')
                            <p style="color: #ae1c17">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">@lang('site.email1')</label>
                            <input type="email" name="email1" value="{{$client->email1}}" disabled placeholder="@lang('site.email1')" class="form-control">
                            @error('email1')
                            <p style="color: #ae1c17">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">@lang('site.email2')</label>
                            <input type="email"  name="email2" value="{{$client->email2}}" disabled placeholder="@lang('site.email2')" class="form-control">
                            @error('email2')
                            <p style="color: #ae1c17">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="">@lang('site.website')</label>
                            <input type="url"  name="website" value="{{$client->website}}" disabled placeholder="@lang('site.website')" class="form-control">
                            @error('website')
                            <p style="color: #ae1c17">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <div class="col-md-12">@lang('site.address') </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 mb-3">
                            <label for="">@lang('site.area')</label>
                            <input type="text" name="area" value="{{$client->address->area}}" disabled placeholder="@lang('site.area')" class="form-control">
                            @error('area')
                            <p style="color: #ae1c17">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">@lang('site.block')</label>
                            <input type="number" name="block" value="{{$client->address->block}}" disabled placeholder="@lang('site.block')" class="form-control">
                            @error('block')
                            <p style="color: #ae1c17">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">@lang('site.street')</label>
                            <input type="text" name="street" value="{{$client->address->street}}" disabled placeholder="@lang('site.street')" class="form-control">
                            @error('street')
                            <p style="color: #ae1c17">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="">@lang('site.zip_code')</label>
                            <input type="number"  name="zip_code"  value="{{$client->address->zip_code}}" disabled placeholder="@lang('site.zip_code')" class="form-control">
                            @error('zip_code')
                            <p style="color: #ae1c17">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    {{-- sister companies--}}




                    <div class="row mb-3">
                        <div class="col-md-12">@lang('site.sister_companies')</i></div>
                    </div>

                        @foreach($client->sisterCompanies as $index=>$company)

                            <div class="wrapper mb-3" style="border: 1px dotted cornflowerblue; padding: 10px">
                            <div style="text-align: center">Company - {{$index+1}}</div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label for="">@lang('site.company_name')</label>
                                        <input type="text"  value="{{$company->name}}" name="company_name[]" disabled placeholder="@lang('site.company_name')" class="form-control">
                                        @error('company_name.*')
                                        <p style="color: #ae1c17">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">@lang('site.company_phone1')</label>
                                        <input type="number" name="company_phone1[]"  value="{{$company->phone1}}" disabled placeholder="@lang('site.company_phone1')" class="form-control">
                                        @error('company_phone1')
                                        <p style="color: #ae1c17">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">@lang('site.company_phone2')</label>
                                        <input type="number" name="company_phone2[]"  value="{{$company->phone2}}" disabled placeholder="@lang('site.company_phone2')" class="form-control">
                                        @error('company_phone2')
                                        <p style="color: #ae1c17">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="">@lang('site.company_email1')</label>
                                        <input type="email" name="company_email1[]" value="{{$company->email1}}"  disabled  placeholder="@lang('site.company_email1')" class="form-control">
                                        @error('company_email1')
                                        <p style="color: #ae1c17">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">@lang('site.company_email2')</label>
                                        <input type="email"  name="company_email2[]"  value="{{$company->email2}}" disabled placeholder="@lang('site.company_email2')" class="form-control">
                                        @error('company_email2')
                                        <p style="color: #ae1c17">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                        @endforeach

                    <hr>




                    <div class="row mb-3">
                        <div class="col-md-12">@lang('site.social_media_accounts')</div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">@lang('site.instagram')</label>
                            <input type="url" name="instagram" value="{{$client->instagram}}" disabled placeholder="@lang('site.instagram')" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">@lang('site.facebook')</label>
                            <input type="url" name="facebook" value="{{$client->facebook}}" disabled placeholder="@lang('site.facebook')" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="">@lang('site.twitter')</label>
                            <input type="url" name="twitter" value="{{$client->twitter}}" disabled placeholder="@lang('site.twitter')" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">@lang('site.snapchat')</label>
                            <input type="url" name="snapchat" value="{{$client->snapchat}}" disabled placeholder="@lang('site.snapchat')" class="form-control">
                        </div>
                    </div>



                    <!--end of card body-->
                </div>



            </div>
        </div>

    </div>
    </div>
@stop

