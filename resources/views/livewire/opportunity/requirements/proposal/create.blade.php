<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">{{ $title }}</div>


                <div class="card-body">

                    <label for="">@lang('site.opportunity_name')</label>
                    <div class="form-row mb-3">
                        <div class="col-md-12">
                            <input type="text" class="form-control" value="{{$opportunity['name']}}" disabled>
                        </div>
                    </div>


                    <label for="">@lang('site.list_of_features')</label>
                    <div class="form-row">
                        <div class="col-md-12" wire:ignore>
                            <textarea wire:model.lazy="features" name="features" id="features" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                    </div>
                    <div class="form-row mb-3">
                        @error('features') <span class="error text-danger">{{ $message }}</span> @enderror

                    </div>


                    <div class="bg-light p-2 mb-3">
                        <span for="" style="font-weight: bold">@lang('site.client_details')</span>
                        <div class="form-row mt-2">
                            <div class="col-md-6">
                                <label for="">@lang('site.client_name') : </label>
                                <span>{{$client['name']}}</span>
                            </div>

                            <div class="col-md-6">
                                <label for="">@lang('site.street_address')</label>
                                <span>{{$client->address->street ?? '-'}}</span>
                            </div>
                        </div>

                        <div class="form-row mt-2">
                            <div class="col-md-6">
                                <label for="">@lang('site.phone_number') : </label>
                                <span>{{$client['phone1']}}</span>
                            </div>


                            <div class="col-md-6">
                                <label for="">@lang('site.city_zip_code') :</label>
                                <span>{{$client->address->zip_code ?? '-'}}</span>
                            </div>

                        </div>
                    </div>

                    
                    <div class="form-row mb-3">
                        <div class="col-md-4">
                            <label for="">@lang('site.date')</label>
                            <input type="date" wire:model="fields.date" name="date" class="form-control">
                            @error('fields.date') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="">@lang('site.deliverables')</label>
                            <div wire:ignore>
                                <select wire:model="deliverablesContent" name="deliverables" id="deliverables" multiple class="form-control">
                                    @foreach($deliverables as $index=>$deliverable)
                                        <option value="{{$index}}">{{$deliverable}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                    @error('deliverablesContent') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">@lang('site.technologies')</label>
                            <div wire:ignore>
                                <select wire:model="technologiesContent" name="technologies" id="technologies" multiple class="form-control">
                                    @foreach($technologies as $index=>$technology)
                                        <option value="{{$index}}">{{$technology}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                @error('technologiesContent') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- <label for="">@lang('site.deliverables')</label>
                    <div class="form-row">
                        <div wire:ignore class="col-md-5">
                            <select wire:model="deliverablesContent" name="deliverables" id="deliverables" multiple class="form-control">
                                @foreach($deliverables as $index=>$deliverable)
                                    <option value="{{$index}}">{{$deliverable}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> -->
                    <!-- <div class="form-row mb-3">
                            @error('deliverablesContent') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div> -->

                    <!-- <label for="">@lang('site.technologies')</label>
                    <div class="form-row">
                        <div  class="col-md-5" wire:ignore>
                            <select wire:model="technologiesContent" name="technologies" id="technologies" multiple class="form-control">
                                @foreach($technologies as $index=>$technology)
                                    <option value="{{$index}}">{{$technology}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row mb-5">
                        @error('technologiesContent') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div> -->





                   


                <div class="dotted-wrap">
                    <div class="form-row align-items-center mb-3">
                            <label class="h6" for="">@lang('site.resources')</label>
                            <a  href="" wire:click.prevent="repeatResourceSection" class="btn btn-thirdly btn-sm repeatResource ml-3"><i class="icon-plus"></i></a>
                    </div>
                    @foreach($resourceSection as $i=>$section)


                        <div class="wrapper ">
                            <div class="form-row align-items-end">

                                <div class="col-md-4 form-group" wire:ignore>
                                    <label for="">@lang('site.resources')</label>
                                    <select  wire:model.lazy="resourceSection.{{$i}}.resource"  class="form-control">
                                        <option value="">@lang('site.select_resource')</option>
                                        @foreach($resources as $resource)
                                            <option value="{{$resource['id']}}">{{$resource['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-4 form-group" wire:ignore>
                                    <label for="">@lang('site.estimation_type')</label>
                                    <select  wire:model.lazy="resourceSection.{{$i}}.estimation_type"  class="form-control">
                                        <option value="">@lang('site.choose_estimation_type')</option>
                                        @foreach($estimation_types as $index=>$type)
                                            <option value="{{$index}}">{{$type}}</option>
                                        @endforeach
                                    </select>
                                    @error('estimation_type.' .$i.  '.estimation_type') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-3 form-group">
                                    <label for="">@lang('site.estimation_time')</label>
                                    <input  type="number"  wire:model.lazy="resourceSection.{{$i}}.estimation"  min="1" class="form-control estimation-input">
                                    @error('estimation.' .$i.  '.estimation') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>

                                @if($i != 0)
                                <div class="col-md-1 form-group">
                                    <button wire:click.prevent="minusResourceSection( {{ $i }} )" class="btn btn-danger btn-sm  ml-3">
                                        <i class="icon-minus"></i>
                                    </button>
                                </div>
                                @endif


                            </div>


                            <div class="form-row">
                                <div class="col-md-3">
                                @error('resourceSection.' .$i.  '.resource') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-md-3">
                                @error('resourceSection.' .$i.  '.estimation_type') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>


                                <div class="col-md-3">
                                @error('resourceSection.' .$i.  '.estimation') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                </div>



                        </div>


                    @endforeach
                </div>




                    <div class="form-row form-group mt-3 justify-content-end form-controls">
                        <div class="col-md-1">
                            <a href="" class="btn btn-danger ml-3" wire:click.prevent="resetAllInputs">@lang('site.reset')</a>
                        </div>

                        <div class="col-md-1">

                            <button type="submit" wire:click.pervent="store" class="btn btn-secondary ml-3 test">@lang('site.save')</button>
                        </div>

                    </div>

                </div>

{{--            </form>--}}
        </div>
    </div>
</div>


@push('js')


    <script>
        $(document).ready(function () {
            CKEDITOR.instances['features'].on('change', function(e){
            @this.set('features', e.editor.getData());
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#technologies, #deliverables').select2({
                placeholder: 'Select an option',
            });

            $('#deliverables').on('change', function (e) {
                var data = $('#deliverables').select2("val");
            @this.set('deliverablesContent', data)
            });

            $('#technologies').on('change', function (e) {
                var data = $('#technologies').select2("val");
                @this.set('technologiesContent', data)
            });
        });

    </script>

    <script>
        Livewire.on('proposalAdded', () => {
           toastr.success(" {!! trans('site.added_successfully') !!} ")
           $('#deliverables').val(null).trigger('change');
           $('#technologies').val(null).trigger('change');
            CKEDITOR.instances['features'].setData('');
        });

        Livewire.on('resetInputs', () => {
            $('#deliverables').val(null).trigger('change');
            $('#technologies').val(null).trigger('change');
            CKEDITOR.instances['features'].setData('');
        });


    </script>

@endpush
