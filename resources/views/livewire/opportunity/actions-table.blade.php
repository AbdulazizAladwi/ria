<div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col-md-6 my-3">



                @if ( !$stageIsOver )
                    @if ( !$hasLastStatus )
                        <button wire:click.prevent="$emit('prepareCreate')" class="btn btn-primary">
                                    @lang('site.add_action')
                        </button>
                    @endif
                @endif

                @include('dashboard.opportunities.actions.modals.add')



            </div>
        </div>
        <div class="card">
            <div class="card-header d-flex align-content-between">

                <div>@lang('site.actions')</div>

            </div>
            <div class="card-body">
                    <table class="table table-bordered m-0">
                        <thead>
                        <tr>
                            <th>@lang('site.action')</th>
                            <th>@lang('site.date')</th>
                            <th>@lang('site.time')</th>
                            <th>@lang('site.duration')</th>
                            <th class="text-center">@lang('site.files')</th>
                            <th>@lang('site.created_at')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse( $actions as $action )
                        <tr>
                            <td style="max-width: 300px">{{ $action->wordWrap() }}</td>
                            <td>{{ $action->date() }}</td>
                            <td>{{ $action->time() }}</td>
                            <td>
                                @if ( $action->hasDuration() )
                                    {{ $action->duration }} @lang('site.hour')
                                @else
                                    <p>@lang('site.no_duration')</p>
                                @endif
                            </td>
                            <td class="text-center">
                                @if ( $action->hasFile() )
                                    <a href="{{ $action->filePath() }}" download>
                                        <span class="icon-download3"></span>
                                    </a>
                                    <a  target="_blank" href="{{ $action->filePath() }}" class="icon-eye2 ml-2"></a>
                                    <div class="mt-2">{{$action->getStringFileName()}}</div>
                                @else
                                 <p>@lang('site.no_file')</p>
                                @endif
                            </td>
                            <td>{{ $action->created_at->format('d M Y') }}</td>
                        </tr>
                        @empty
                            <p>@lang('site.no_records')</p>
                        @endforelse
                        </tbody>

                        <div class="m-3">
                            {{ $actions->links() }}
                        </div>

                    </table>

            </div>
        </div>
    </div>

</div>


@push('js')

    <script>
        Livewire.on('prepareCreate',()=> {
            $('#addAction').modal('show');
        })

        Livewire.on('actionAdded',()=> {
            $('#addAction').modal('hide');
            toastr.success("{!! trans('site.added_successfully') !!}")
        })
    </script>

@endpush

