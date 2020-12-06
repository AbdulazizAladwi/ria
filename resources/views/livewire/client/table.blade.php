<div>
    <div class="filter-sec">
        <div class="row">

            <!--search input-->
            <div class="col-md-4">
                <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="@lang('site.search_by_name')">
            </div>

            <div class="col-md-4">
                <select wire:model="type" name="type" class="form-control">
                    <option value="">@lang('site.search_by_type')</option>
                    @foreach($ClientTypes as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>


            <!--Add button-->
            <div class="col-md-4 d-flex justify-content-end">
                <a href="{{route('dashboard.clients.create')}}" class="btn btn-primary mb-3 float-btn">
                    <span><i class="icon-plus"></i> @lang('site.add')</span>
                </a>
            </div>

            <!--delete Modal-->
            @include('dashboard.clients.modals.delete')


        </div>
    </div>

    <div class="card">
        <div class="card-header">@lang('site.clients')
                    <small class="">({{ $clients->total() }})</small>
        </div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th> # </th>
                    <th>@lang('site.name')</th>
                    <th>@lang('site.type')</th>
                    <th>@lang('site.email')</th>
                    <th>@lang('site.phone')</th>
                    <th>@lang('site.contacts')</th>
                    <th>@lang('site.control')</th>
                </tr>
                </thead>
                <tbody>
                @forelse($clients as $index=>$client)
                    <tr>
                        <td>{{ $index + 1  }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->type->name}}</td>
                        <td>{{ $client->email1 ?? '-' }}</td>
                        <td>{{ $client->phone1 ?? '-' }}</td>
                        <td>
{{--                            <a class="btn btn-success btn-sm" href="{{route('dashboard.contacts.create', $client->id)}}">--}}
                                <a class="btn btn-success btn-sm" href="{{route('dashboard.contacts.view', $client->id)}}">
                                    <i class="icon-eye"></i>
                                </a>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{route('dashboard.clients.show', $client->id)}}" class="btn btn-info btn-sm mx-1"><i class="icon-eye"></i></a>
                            
                                <a href="{{route('dashboard.clients.edit', $client->id)}}" class="btn btn-success btn-sm mx-1"><i class="icon-edit2"></i></a>
                            
                                <a href="" class="btn-sm btn-warning mx-1" wire:click.prevent="$emit('prepareDelete', {{$client->id}})" data-target="#DeleteClient"><i class="icon-delete2"></i></a>
                            </div>


                        </td>
                    </tr>
                @empty
                    <p>@lang('site.no_records')</p>
                @endforelse

            </table>
            <!--Delete Modal-->


            </tbody>
            <div class="m-3">
                {{ $clients->links() }}
            </div>

        </div>
    </div>
</div>


@push('js')
    <script>
        Livewire.on('prepareDelete', ()=> {
            $('#DeleteClient').modal('show');
        })

        Livewire.on('ClientDeleted', ()=> {
            $('#DeleteClient').modal('hide');
            toastr.success("{!! trans('site.deleted_successfully') !!}")
        })

    </script>
@endpush
