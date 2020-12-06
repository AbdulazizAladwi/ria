<div>
    <div class="filter-sec">
        <div class="row">
            <!--search input-->


            <div class="col-md-4">
                <input wire:model.debounce.500ms="search" type="text" class="form-control"
                    placeholder="@lang('site.search_by_name')">
            </div>


            <!--Add button-->
            <div class="col-md-8 text-right">
                <a href="{{ route('dashboard.users.create') }}" class="btn btn-primary  float-btn">
                    {{-- <span class="icon-plus"></span> --}}
                    <span><i class="icon-plus"></i> @lang('site.add')</span>
                </a>
            </div>
        </div>
    </div>


    {{-- Delete Modal --}}

    @include('dashboard.users.modals.delete')





    <div class="card">
        <div class="card-header">@lang('site.users')
            <small class="">({{ $users->total() }})</small>
        </div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('site.name')</th>
                        <th>@lang('site.email')</th>
                        <th>@lang('site.roles')</th>

                        <th>@lang('site.control')</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ( $user->roles as $role )
                                    <span class="badge badge-success">
                                        {{ $role->name }}
                                    </span>
                                @endforeach
                            </td>

                            <td>

                                

                                <div class="d-inline-block">
                                    <a
                                        class="btn btn-info btn-sm" 
                                        href="{{ route('dashboard.users.edit',$user->id) }}"
                                        >
                                        <i class="icon-edit2"></i>
                                        
                                    </a>
                                </div>

                                <div class="d-inline-block">
                                    <button wire:click.prevent="$emit('prepareDelete',{{ $user->id }})"
                                        class="btn btn-warning btn-sm"><i class="icon-delete2"></i></button>
                                </div>

                            </td>
                        </tr>
                    @empty
                        <p>@lang('site.no_records')</p>
                    @endforelse

            </table>
            </tbody>
            <div class="m-3">
                {{ $users->links() }}
            </div>

        </div>
    </div>
</div>



@push('js')
    <script>
        livewire.on('prepareDelete',()=> {
            $('#deleteUser').modal('show');
        })

        livewire.on('userDeleted',()=> {

            $('#deleteUser').modal('hide');
            toastr.success("{!! trans('site.deleted_successfully') !!}")

        })
    </script>
@endpush



