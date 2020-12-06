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
                <a href="" class="btn btn-primary  float-btn" wire:click.prevent="$emit('prepareAdd')" data-toggle="modal"
                    data-target="#AddTeam">
                    {{-- <span class="icon-plus"></span> --}}
                    <span><i class="icon-plus"></i> @lang('site.add')</span>
                </a>
            </div>
        </div>
    </div>

    <!--Modals-->
    @include('dashboard.teams.modals.add')
    @include('dashboard.teams.modals.delete')






    <div class="card">
        <div class="card-header">@lang('site.teams')
            <small class="">({{ $teams->total() }})</small>
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
                    @forelse($teams as $index => $team)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $team->name }}</td>
                            <td>
                                <div class="d-inline-block">
                                    <button wire:click.prevent="$emit('prepareUpdate', {{ $team->id }})"
                                        class="btn btn-info btn-sm" type="button" data-toggle="modal"
                                        data-target="#AddClientType"><i class="icon-edit2"></i> </button>
                                </div>

                                <div class="d-inline-block">
                                    <button wire:click.prevent="$emit('prepareDelete',{{ $team->id }})"
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
                {{ $teams->links() }}
            </div>

        </div>
    </div>
</div>


@push('js')

    <script>
        Livewire.on('team_added', () => {
            $('#AddTeam').modal('hide');
            toastr.success('{!!  trans("site.added_successfully") !!}');
        });

        Livewire.on('prepareDelete', () => {
            $('#DeleteTeam').modal('show');
        });

        Livewire.on('teamDeleted', () => {
            $('#DeleteTeam').modal('hide');
            toastr.success('{!!  trans("site.deleted_successfully") !!}');
        });

        Livewire.on('prepareUpdate', () => {
            $('#AddTeam').modal('show');
        });

        Livewire.on('team_updated', () => {
            $('#AddTeam').modal('hide');
            toastr.success('{!!  trans("site.updated_successfully") !!}');
        });

    </script>

@endpush
