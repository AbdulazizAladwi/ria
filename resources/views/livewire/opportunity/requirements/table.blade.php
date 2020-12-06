<div>
    <div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="row">
                <div class="col-md-6 my-3">


                        @if ( !$stageIsOver )
                         <button class="btn btn-primary" data-toggle="modal" wire:click.prevent="$emit('prepareAdd')" data-target="#addRequirement">@lang('site.add_requirement')</button>
                        @endif
                        @include('dashboard.opportunities.requirements.modals.add')
                        @include('dashboard.opportunities.requirements.modals.delete')

                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex align-content-between">

                    <div>@lang('site.requirements')</div>

                </div>
                <div class="card-body">
                    <table class="table table-bordered m-0">
                        <thead>
                        <tr>
                            <th>@lang('site.requirements')</th>
                            <th>@lang('site.deadline')</th>
                            <th>@lang('site.details')</th>
                            <th>@lang('site.control')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse( $requirements as $requirement )
                            <tr>
                                <td>{{ $requirement->requirementString() }}</td>
                                <td>{{ $requirement->deadline }}</td>
                                <td class="">

                                      <a class="btn btn-info btn-sm m-auto"
                                         href="{{ $requirement->showUrl() }}"
                                      >
                                          <i class="icon-eye"></i>

                                      </a>

                                </td>
                                <td>
                                    <button wire:click.prevent="$emit('prepareDelete', {{$requirement->id}})" class="btn btn-danger btn-sm"><i class="icon-delete2"></i></button>
                                </td>
                            </tr>
                        @empty
                            <p>@lang('site.no_records')</p>
                        @endforelse
                        </tbody>

                    </table>

                </div>
            </div>
        </div>

    </div>

</div>





