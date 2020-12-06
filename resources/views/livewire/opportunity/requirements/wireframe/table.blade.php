<div class="card">

    <div class="m-3">


        @if ( $isEmptyWireframes )

            @if ( !$opportunity->stageIsOver(3) )
                <button class="btn btn-primary"
                        data-toggle="modal" data-target="#addUpdate"
                        wire:click.prevent="$emit('prepareCreate')"
                >@lang('site.add')</button>
           @endif

        @endif
            @include('dashboard.opportunities.requirements.wireframe.modals.add-update')

    </div>

    <div class="card-header">@lang('site.wireframes')</div>
    <div class="card-body">
        <table class="table table-striped m-0">
            <thead>
            <tr>
                <th>@lang('site.wireframe_versions')</th>
                <th>@lang('site.date')</th>
                <th>@lang('site.file')</th>
                <th>@lang('site.control')</th>

            </tr>
            </thead>
            <tbody>
            @forelse( $wireframes as $wireframe )
                <tr>
                    <td>{{ $wireframe->description }}</td>
                    <td>{{ $wireframe->created_at->toDateString() }}</td>
                    <td>

                            <a href="{{ $wireframe->filePath() }}" download>
                                <i class="icon-file-text2"></i>
                            </a>

                    </td>

                    <td>
                        @if ( $opportunity->stageIsOver(3) )

                            <button class="btn btn-info text-white disabled"
                            >
                                <i class="icon-edit"></i>
                            </button>

                        @else
                            <a
                                href="#"
                                    wire:click.prevent="$emit('prepareUpdate',{{ $wireframe->id }})"
                            >
                                <i class="icon-edit2"></i>
                            </a>
                        @endif



                    </td>
                </tr>
            @empty
                 <p>@lang('site.no_records')</p>
            @endforelse
            </tbody>
            <div class="m-3">
                {!! $wireframes->links() !!}
            </div>
        </table>
    </div>
</div>



@push('js')

    <script>
        Livewire.on("wireframeAdded",()=> {
            $('#addUpdate').modal('hide');
        })

        Livewire.on("prepareUpdate",()=> {
            $('#addUpdate').modal('show');
        })
    </script>

@endpush
