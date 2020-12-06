<div>
<div>
    @if ( $opportunity->inLastStage() and $stageNumber == 4 )

        <a wire:click.prevent="$emit('statusClicked',3)" class="btn status-btn {{ $activeStatus == 3 ? 'btn-success text-white' : 'btn-outline-success' }}">@lang('site.won')</a>
        <a wire:click.prevent="$emit('statusClicked',5)" class="btn status-btn {{ $activeStatus == 5 ? 'btn-warning text-white' : 'btn-outline-warning' }}">@lang('site.hold')</a>
        <a wire:click.prevent="$emit('statusClicked',4)" class="btn status-btn {{ $activeStatus == 4 ? 'btn-danger text-white' : 'btn-outline-danger' }}">@lang('site.lost')</a>
        <a wire:click.prevent="$emit('statusClicked',6)" class="btn status-btn {{ $activeStatus == 6 ? 'btn-info text-white' : 'btn-outline-info' }}">@lang('site.canceled')</a>

    @else

            @if ( $showStopBtn )
                <button class="btn btn-warning"
                wire:click.prevent="$emit('stopClicked',{{ $stageNumber }})"
                >@lang('site.not_qualified')</button>
            @endif


            <button class="btn btn-info"
                    wire:click.prevent="$emit('nextClicked',{{ $stageNumber }})"
            >@lang('site.qualified')
        </button>

    @endif
</div>
</div>



@push('js')


    <script>
        Livewire.on('statusChanged',() => {
            toastr.success("{{ trans('site.updated_successfully') }}")
        })
    </script>


@endpush


@push('css')

    <style>
        .status-btn{
            cursor: pointer;
        }
        .status-btn:hover{
            color: #FFF !important;
        }
    </style>

@endpush
