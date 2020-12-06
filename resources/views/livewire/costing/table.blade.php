<div>
<!--@if(session()->has('message'))
<div class="col-md-12">
    <div class="alert alert-success">{{ session('message') }}</div>
</div>
@endif!-->
<div class="card">
        <div class="card-header">
        @lang('site.costing')
</div>
<hr>
@include('livewire.costing.delete')
<!-------------------Search Input--------------------------->
<div class="col-sm-3">
   <input type="text" class="form-control" placeholder="@lang('site.search_by_name')" wire:model="searchTerm" />
</div>
<!-----------------------Costing Table-------------------------->
<div class="card-body">
    <table class="table table-striped m-0">
        <thead>
            <tr>
                <th>@lang('site.opportunity_name')</th>
                <th>@lang('site.versions')</th>
                <th>@lang('site.date')</th>
                <th>@lang('site.client')</th>
                <th>@lang('site.contacts')</th>
                <th>@lang('site.action')</th>
            </tr>
        </thead>
        @foreach($details as $index=>$row)
            <tr>
            <!-----------------Relation------------------->
                <td>{{$row->requirement->opportunity->name}}</td>
                <td>version{{$index+1}}</td>
                <td>{{$row->date->format('d M Y')}}</td>
                <td>{{$row->client->name}}</td>
                <td>{{$row->requirement->opportunity->contact->name ?? '-'}}</td>
                <td>
                @if(!$row->cost()->count()>0)
                <a href="{{route('dashboard.addcost',$row->id)}}" class="btn"><i class="icon-plus"></i></a> <!-- icon-add_box !-->
                @endif
                <!-- <button wire:click="destroy({{ $row->id }})" class="btn btn-danger btn-sm"><i class="icon-delete2"></i></button> -->
                @if($row->cost()->count()>0)
                <a href="{{route('dashboard.show',$row->id)}}" class="btn btn-info btn-sm"><i class="icon-eye"></i></a>
                <a href="{{route('dashboard.editcost',$row->id)}}" class="btn btn-primary btn-sm"><i class="icon-edit2"></i></a>
                <button wire:click.prevent="$emit('deletionConfirm',{{ $row->cost->id ?? $row->id }})" class="btn btn-warning btn-sm"><i
                    class="icon-delete2"></i></button>
                <a href="{{route('dashboard.pdf.proposalCosting',$row->id)}}" target="_blank" class="btn print"><i class="icon-print2"></i></a>
                {{-- <a href="{{route('dashboard.docx.proposalCosting', $row->id)}}" class="d-inline-block">
                                    <i class="icon-download2"></i></a> --}}
                <button type="button" class="btn" data-toggle="modal" data-target="#myModal_{{$row->id}}"><i class="icon-redo2"></i></button>
                @endif
                </td>
                </div>
            </tr>
            @include('emails.form')
@endforeach
</table>
</div> 
</div>
{{ $details->links() }}

@push('js')

    <script>
        Livewire.on('deletionConfirm', () => {
            $('#ConfirmDeleteCost').modal('show');
        })

        Livewire.on('userdelete', () =>{
            $('#ConfirmDeleteCost').modal('hide');
            toastr.success('{!!  trans("site.deleted_successfully") !!}');
        })
        // toastr()->render()


    </script>

@endpush
