<div>
    <div class="filter-sec">
        <div class="row">


            <!--search input-->
            <div class="col-md-4">
                <input wire:model.lazy="search" type="text" class="form-control" placeholder="@lang('site.search_by_name')">
            </div>

            <!--Modals-->
            @include('dashboard.client-types.modals.add')
            @include('dashboard.client-types.modals.delete')



            <!--Add button-->
            <div class="col-md-9 d-flex justify-content-end">
                <a wire:click.prevent="prepareAdd" href="" class="btn btn-primary mb-3 float-btn" data-toggle="modal" data-target="#AddClientType">
                    <span><i class="icon-plus"></i> @lang('site.add')</span>
                </a>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">@lang('site.client_types')
            <small class="">({{ $types->total() }})</small>
        </div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('site.name')</th>
                        <th>@lang('site.control')</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse( $types as $index => $type )
                        <tr>
                            <td>{{ $index + 1}}</td>
                            <td>{{ $type->name}}</td>
                            <td>
                                <div class="d-inline-block">
                                    <button wire:click.prevent="$emit('updateModal', {{$type->id}})" class="btn btn-info btn-sm" type="button"
                                        data-toggle="modal" data-target="#AddClientType"><i class="icon-edit2"></i> </button>
                                </div>

                                <div class="d-inline-block">
                                    <button wire:click.prevent="$emit('deletionConfirm',{{ $type->id }})" class="btn btn-warning btn-sm"><i
                                            class="icon-delete2"></i></button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <p>@lang('site.no_records')</p>
                    @endforelse

            </table>
            </tbody>
            <div class="m-3">
                {{ $types->links() }}
            </div>

        </div>
    </div>
</div>


@push('js')

    <script>
        Livewire.on('deletionConfirm', () => {
            $('#ConfirmDeleteClientType').modal('show');
        })

        Livewire.on('DeleteClientType', () =>{
            $('#ConfirmDeleteClientType').modal('hide');
            toastr.success('{!!  trans("site.deleted_successfully") !!}');
        })


        Livewire.on('updateModal', ($id) => {
            $('#AddClientType').modal('show');
        })

        Livewire.on('ClientTypeAdded', () => {
            $('#AddClientType').modal('hide');
            toastr.success('{!!  trans("site.added_successfully") !!}');
        })

        Livewire.on('ClientTypeUpdated', () => {
            $('#AddClientType').modal('hide');
            toastr.success('{!!  trans("site.updated_successfully") !!}');

        })


    </script>

@endpush
