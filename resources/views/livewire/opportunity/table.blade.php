<div>
    <div class="filter-sec">
        <div class="row">



            <!--search input-->
            <div class="col-md-4">
                <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="@lang('site.search_by_opportunity_name')">
            </div>

            <div class="col-md-4">
                <select name="type" wire:model="filterStageId" wire:change="getFilterStatus" class="form-control">
                    <option value="">@lang('site.search_by_stage')</option>
                    @foreach($filterStages as $index=>$stage)
                        <option value="{{$index}}">{{$stage}}</option>
                    @endforeach
                </select>
            </div>

            @if($filterStatusByStage)
                <div class="col-md-4">
                    <select wire:model="status" name="type" class="form-control">
                        <option value="">@lang('site.search_by_status')</option>
                        @foreach($filterStatusByStage as $index=>$status)
                            <option value="{{$index}}">{{$status}}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <!--Add button-->
            <div class="col-md-{{ is_null($filterStatusByStage) ? 6 : 4 }} d-flex justify-content-end">
                <a  href="{{route('dashboard.opportunities.create')}}" class="btn btn-primary mb-3 float-btn">
                    <span><i class="icon-plus"></i> @lang('site.add')</span>
                </a>
            </div>

            <!--Modals-->

            {{--        @include('dashboard.opportunities.modals.change-status')--}}
            @include('dashboard.opportunities.modals.delete')
            @include('dashboard.opportunities.modals.edit')



        </div>
    </div>

    <div class="card">
        <div class="card-header">
        @lang('site.opportunities')
        <small class="">({{ $opportunities->total() }})</small>
    </div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th> # </th>
                    <th>@lang('site.name')</th>
                    <th>@lang('site.client')</th>
                    <th>@lang('site.contact')</th>
                    <th>@lang('site.stage')</th>
                    <th>@lang('site.status')</th>
{{--                    <th>@lang('site.change_status')</th>--}}
                    <th>@lang('site.opportunity_details')</th>
                    <th>@lang('site.control')</th>
                </tr>
                </thead>
                <tbody>

                @forelse($opportunities as $index=>$opp)
                    <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$opp->name}}</td>
                        <td>{{$opp->client->name}}</td>
                        <td>{{$opp->hasContact() ? $opp->contact->name : '-'}}</td>
                        <td>{{$opp->stageString()}}</td>
                        <td>{{$opp->statusString()}}</td>

{{--                        <td><button class="btn btn-info" wire:click="getOpportunityId({{$opp->id}})" data-toggle="modal" data-target="#ChangeStatus">change status</button></td>--}}
                        <td>
                            <div style="display: inline-block">
                                <a href="{{route('dashboard.opportunities.show', $opp->id)}}" class="btn btn-info btn-sm"><i class="icon-eye"></i></a>
                            </div>
                        </td>
                        <td>
                                <a href="" class="btn btn-warning  btn-sm" wire:click.prevent="$emit('prepareEdit', {{$opp->id}})"><i class="icon-edit2"></i></a>
                                <a href="" class="btn btn-danger btn-sm d-inline-block" wire:click.prevent="$emit('prepareDelete', {{$opp->id}})" style="display: inline-block"><i class="icon-delete2"></i></a>
                        </td>
                    </tr>
                @empty
                    <p>@lang('site.no_records')</p>
                @endforelse

            </table>
            <!--Delete Modal-->


            </tbody>
            <div class="m-3">
                {{ $opportunities->links() }}
            </div>

        </div>
    </div>
</div>


@push('js')
    <script>
        Livewire.on('updatedSuccessfully', ()=>{
            $('#ChangeStatus').modal('hide');
            toastr.success('{!!  trans("site.added_successfully") !!}');
        })


        Livewire.on('prepareDelete', () => {
            $('#ConfirmDeleteClientType').modal('show');
        })


        Livewire.on('deleted_Successfully', ($id) => {
            $('#ConfirmDeleteClientType').modal('hide');
            toastr.success('{!!  trans("site.deleted_successfully") !!}');

        })

        Livewire.on('prepareEdit', () => {
            $('#EditOpportunity').modal('show')
        })

        Livewire.on('opportunityNameUpdated', () => {
            $('#EditOpportunity').modal('hide');
            toastr.success("{!! trans('site.updated_successfully') !!}")
        })

    </script>

@endpush
