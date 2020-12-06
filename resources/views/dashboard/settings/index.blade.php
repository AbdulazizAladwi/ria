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
                            <li class="breadcrumb-item active" aria-current="page">@lang('site.setting')</li>
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
            <div>
                <div class="card">
                    <div class="card-header">@lang('site.settings')</div>
                    <form action="{{route('dashboard.settings.update')}}"  method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                        <div class="row m-3">
                            <div class="col-md-6">
                                <label for="">@lang('site.name')</label>
                                <input type="text" name="name" value="{{$setting->name}}" class="form-control" required>
                                @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="col-md-6">
                                <label for="">@lang('site.description')</label>
                                <textarea name="description" id="" cols="30" rows="5" class="form-control" required>{{$setting->description}}</textarea>
                                @error('description') <span class="error text-danger">{{ $message }}</span> @enderror

                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="col-md-6">
                                <label for="">@lang('site.phone')</label>
                                <input type="number" name="phone"  value="{{$setting->phone}}" class="form-control" required>
                                @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror

                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="col-md-6">
                                <label for="">@lang('site.email')</label>
                                <input type="email" name="email" value="{{$setting->email}}" class="form-control" required>
                                @error('email') <span class="error text-danger">{{ $message }}</span> @enderror

                            </div>
                        </div>
                        <!--------------Monthly Working Days----------------->
                        <div class="row m-3">
                            <div class="col-md-6">
                                <label for="">Monthly Working Days:</label>
                                <input type="text" name="days" value="{{$setting->days}}" class="form-control" required>
                                @error('days') <span class="error text-danger">{{ $message }}</span> @enderror

                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="col-md-6" wire:igonre.self>
                                <label for="">@lang('site.dashboard_logo')</label>
                                <input type="file" class="form-control image" name="dashboard_logo">
                                @error('dashboard_logo') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>



                            <div class="col-md-6">
                                <img class="image_preview" src="{{'storage/' . dashboard_setting()['dashboard_logo']}}" style="width: 100px;height: 100px" alt="" wire:ignore.self>
                            </div>
                        </div>

                        <div class="row m-3">
                            <div class="col-md-6">
                                <label for="">@lang('site.admin_image')</label>
                                <input type="file" class="form-control admin-image" name="admin_image">
                                @error('admin_image') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6">
                                <img class="admin-image_preview" src="{{'storage/' . dashboard_setting()['admin_image']}}" style="width: 100px;height: 100px"  alt="" wire:ignore.self>
                            </div>
                        </div>

                            <div class="d-flex justify-content-end">
                                <!-- <div class="col-md-12" style="text-align: right"> -->
                                    <button class="btn btn-secondary">@lang('site.update')</button>
                                <!-- </div> -->
                            </div>


                    </div>
                    </form>
                </div>
            </div>


            @push('js')
                <script>

                    $('.image').change(function () {

                        if (this.files && this.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('.image_preview').attr('src', e.target.result).attr('style', "width: 100px;height: 100px");
                            }

                            reader.readAsDataURL(this.files[0]); // convert to base64 string
                        }
                    })


                    $('.admin-image').change(function () {

                        if (this.files && this.files[0]) {
                            var reader = new FileReader();

                            reader.onload = function(e) {
                                $('.admin-image_preview').attr('src', e.target.result).attr('style', "width: 100px;height: 100px");
                            }

                            reader.readAsDataURL(this.files[0]); // convert to base64 string
                        }
                    })



                </script>

            @endpush

        </div>
    </div>
@endsection

