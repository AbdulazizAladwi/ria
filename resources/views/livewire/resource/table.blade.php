<div>
    <div class="filter-sec">
        <div class="row">
            <!--Add button-->
            <div class="col-md-4">
                <input wire:model.debounce.500ms="search" type="text" class="form-control"
                    placeholder="{{ trans('site.name') }}">

            </div>

            <!-- Modals -->

            @include('dashboard.resources.modals.add-update')
            @include('dashboard.resources.modals.delete')





            <!--search input-->

            <div class="col-md-8 d-flex justify-content-end">
                <button wire:click="$emit('createRequested')" class="btn btn-primary mb-3 float-btn" data-toggle="modal">
                    {{-- <span class="icon-plus"></span> --}}

                    <span><i class="icon-plus"></i> @lang('site.add')</span>
                </button>
            </div>


        </div>
    </div>

    <div class="card">
        <div class="card-header">
            @lang('site.resources')

                <small class="">({{ $resources->total() }})</small>


        </div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('site.resource_name')</th>
                        <th>@lang('site.team')</th>
                        <th>@lang('site.resource_price')</th>
                        <th>@lang('site.table_control')</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse( $resources as $index => $resource )
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>{{ $resource->name }}</td>
                            <td>{{ $resource->team->name }}</td>
                            <td>{{ $resource->price }} @lang('site.currency')</td>
                            <td>



                                <div class="d-inline-block">
                                    <button wire:click.prevent="$emit('updateRequested',{{ $resource->id }})"
                                        class="btn btn-info btn-sm">
                                        <i class="icon-edit2"></i>
                                    </button>
                                </div>

                                <div class="d-inline-block">
                                    <button class="btn btn-warning btn-sm"
                                        wire:click.prevent="$emit('deleteRequested',{{ $resource->id }})">
                                        <i class="icon-delete2"></i>

                                    </button>
                                </div>
                            </td>

                        </tr>

                    @empty

                        <p>@lang('site.no_records')</p>

                    @endforelse
                </tbody>

            </table>

            <div class="m-3">
                {!! $resources->links() !!}
            </div>

        </div>
    </div>
</div>






@push('js')

    <script>
        Livewire.on('createRequested', () => {

            $('#addUpdate').modal('show');

        })

        Livewire.on('resourceAdded', () => {

            $('#addUpdate').modal('hide');

            toastr.success('{!!  trans("site.added_successfully") !!}');

        });

        Livewire.on('updateRequested', (id) => {


            $('#addUpdate').modal('show');

        });


        Livewire.on('resourceUpdated', (id) => {

            $('#addUpdate').modal('hide');
            toastr.success('{!!  trans("site.updated_successfully") !!}');

        })


        Livewire.on('deleteRequested', () => {

            $('#deleteResource').modal('show');

        })

        Livewire.on('resourceDeleted', () => {

            $('#deleteResource').modal('hide');

            toastr.success('{!!  trans("site.deleted_successfully") !!}');


        })

    </script>

@endpush
