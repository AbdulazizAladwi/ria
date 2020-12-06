<div>
    <div class="filter-sec">
        <div class="row">

            <!--search input-->
            <div class="col-md-4">
                <input wire:model.debounce.500ms="search" type="text" class="form-control" placeholder="@lang('site.search_by_name')">
            </div>

            <div class="col-md-4">
                <select wire:model="selectedClient" class="form-control">
                    <option value="">@lang('site.select_client')</option>
                    @foreach( $clientChoices as $id => $client )
                        <option value="{{ $id }}">{{ $client }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Delete modal -->
            @include('dashboard.contacts.modals.delete')


            <!--Add button-->
            <div class="col-md-6 d-flex justify-content-end">
                <a  href="{{ route('dashboard.contacts.create',request()->route('client')) }}" class="btn btn-primary mb-3 float-btn">
                    <span><i class="icon-plus"></i> @lang('site.add')</span>
                </a>
            </div>

        </div>
    </div>


    <div class="card">
        <div class="card-header">
        @lang('site.contacts')

        <small class="">({{ $contacts->total() }})</small>


    </div>
        <div class="card-body">
            <table class="table table-striped m-0">
                <thead>
                <tr>
                    <th>#</th>
                    <th>@lang('site.name')</th>
                    <th>@lang('site.client')</th>
                    <th>@lang('site.email')</th>
                    <th>@lang('site.phone')</th>
                    <th>@lang('site.table_control')</th>
                </tr>
                </thead>
                <tbody>
                @forelse( $contacts as $index => $contact )
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>{{ $contact->name }}</td>

                        <td>{{ $contact->client->name }}</td>

                        <td>{{ $contact->email1 }}</td>

                        <td>{{ $contact->phone1 ?? '-' }}</td>

                        <td>

                            <div class="d-inline-block">
                                <a href="{{ route('dashboard.contacts.show',$contact->id) }}" class="btn btn-secondary btn-sm" type="button"
                                ><i class="icon-eye"></i> </a>
                            </div>

                            <div class="d-inline-block">
                                <a
                                    href="{{ route('dashboard.contacts.edit',$contact->id) }}"
                                    class="btn btn-info btn-sm" t
                                    ype="button"
                                        ><i class="icon-edit2"></i> </a>
                            </div>

                            <div class="d-inline-block">
                                <button wire:click.prevent="$emit('deleteRequested',{{ $contact->id }})" class="btn btn-warning btn-sm"><i
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
                {!! $contacts->links() !!}
            </div>

        </div>
    </div>
</div>









@push('js')

    <script>
        Livewire.on('deleteRequested',(id) => {
            $('#deleteContact').modal('show');
        })

        Livewire.on('contactDeleted',()=> {
            $('#deleteContact').modal('hide');

            toastr.success("{!! trans('site.added_successfully') !!}")

        })
    </script>

@endpush



