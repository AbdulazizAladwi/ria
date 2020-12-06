<div>
    <div class="row">
        <div class="col-md-4 ml-3 mb-3">
            <input wire:model="search" type="text" class="form-control" placeholder="@lang('site.search_by_name')">
        </div>


        <div class="col-md-2">
            <a href="{{route('dashboard.permissions.create')}}" class="btn btn-primary mb-3 float-btn">
                <span><i class="icon-plus"></i> @lang('site.add')</span>

            </a>
        </div>



    </div>

    <div class="col-md-12  mx-auto">

        <div class="card">
            <div class="card-header">
                @lang('site.roles')
                <small>({{ $roles->total() }})</small>
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
                    @forelse( $roles as $index => $role )
                        <tr>
                            <td>{{ $index + 1}}</td>
                            <td>{{ $role->name}}</td>
                            <td>
                                <a href="{{route('dashboard.permissions.edit', $role)}}" class="btn btn-warning"><i class="icon-edit2"></i></a>
                                <a wire:click.prevent="$emit('deleteConfirmation', {{$role->id}})" class="btn btn-warning"><i class="icon-delete2"></i></a>
                                <a href="{{route('dashboard.permissions.show', $role->id)}}" class="btn btn-warning"><i class="icon-eye"></i></a>
                            </td>
                        </tr>
                    @empty
                        <p>@lang('site.no_records')</p>
                    @endforelse

                </table>
                {{$roles->links()}}
            </div>
        </div>
    </div>

    <!--Modals-->
    @include('dashboard.permissions.modals.delete')
</div>


@push('js')
    <script>
        Livewire.on('deleteConfirmation', () => {
            $('#ConfirmDeleteRole').modal('show');
        })

        Livewire.on('roleDeleted', () => {
            $('#ConfirmDeleteRole').modal('hide');
            toastr.success('{!!  trans("site.deleted_successfully") !!}');

        })

        Livewire.on('cannotDelete', () => {
            $('#ConfirmDeleteRole').modal('hide');
            toastr.warning('{!!  trans("site.role_cannot-deleted") !!}');

        })
    </script>

@endpush
