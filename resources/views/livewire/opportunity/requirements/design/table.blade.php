<div>
        <div class="row">

            @if(count($designs) == 0)
                 <div class="col-md-6">
                        <a wire:click.prevent="prepareAdd()" href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#AddDesign">@lang('site.add')</a>
                    </div>
            @endif
            @include('dashboard.opportunities.requirements.design.modals.add')
        </div>

    <div class="card">
            <div class="card-header">@lang('site.design')</div>
            <div class="card-body">
                <table class="table table-striped m-0">
                    <thead>
                        <tr>

                            <th>@lang('site.design_versions')</th>
                            <th>@lang('site.creation_date')</th>
                            <th>@lang('site.details')</th>
                            @if(!$opportunity->stageIsOver(3))
                                <th>@lang('site.edit')</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>

                    @forelse( $designs as $design )
                            <tr>
                               <td>{{$design->description}}</td>
                               <td>{{$design->created_at->toDateString()}}</td>
                               <td>
                                   <a href="{{$design->filePath()}}" download>
                                       <i class="icon-file-text2"></i>

                                   </a>

                               </td>

                               <td>
                                   @if(!$opportunity->stageIsOver(3))
                                        <a href="" wire:click.prevent="$emit('prepareUpdate', {{$design->id}})"><i class="icon-edit2"></i></a>
                                   @endif
                               </td>
                            </tr>

                    @empty
                            <p>@lang('site.no_records')</p>
                        @endforelse
                    </tbody>
                </table>

                <div class="m-3">
                    {{ $designs->links() }}
                </div>

            </div>
        </div>


</div>


@push('js')
    <script>
        Livewire.on('DesignAdded', ()=> {
            $('#AddDesign').modal('hide');
            toastr.success(" {!! trans('added_successfully') !!} ")
        })

        Livewire.on('prepareUpdate', ()=> {
            $('#AddDesign').modal('show');
        })



    </script>
@endpush
