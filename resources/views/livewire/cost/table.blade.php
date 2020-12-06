<div class="filter-sec">
<div class="row">
<!--
@if(session()->has('message'))
<div class="col-md-12">
    <div class="alert alert-success">{{ session('message') }}</div>
</div>
@endif
!-->
@include('livewire.cost.update')
@include('livewire.cost.create')
@include('livewire.cost.delete')
<br>
<!--------------------search input----------------------->
<div class="col-sm-4">
   <input type="text" class="form-control" placeholder="@lang('site.search_by_name')" wire:model="searchTerm" />
</div>
<!---------------------Select---------------------------->
<div class="col-sm-4">
<select class="form-control" id="exampleFormControlInput3" wire:model="type">
    <option value="">@lang('site.select_type')</option>
    <option value="Indirect">@lang('site.indirect')</option>
    <option value="Other">@lang('site.other')</option>
</select>
</div>
</div>
<br>
<div class="card">
        <div class="card-header">
        @lang('site.cost_setup')
</div>

<!----------------------Cost Table--------------------------------->
<div class="card-body">
    <table class="table table-striped m-0">
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('site.name')</th>
                <th>@lang('site.cost')</th>
                <th>@lang('site.type')</th>
                <th>@lang('site.action')</th>
            </tr>
        </thead>
        @foreach($data as $row)
            <tr>
                <td>{{$loop->index + 1}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->cost}} KD</td>
                <td>{{$row->type}}</td>
                <td>
                <button data-toggle="modal" data-target="#updateModal" class="btn btn-primary btn-sm" wire:click="edit({{ $row->id }})"><i class="icon-edit2"></i></button>
                <!-- <button wire:click="destroy({{ $row->id }})" class="btn btn-danger btn-sm"><i class="icon-delete2"></i></button>              -->
                <button wire:click.prevent="$emit('deletionConfirm',{{ $row->id }})" class="btn btn-warning btn-sm"><i
                                            class="icon-delete2"></i></button>
                </td>
            </tr>
        @endforeach
    </table>
</div>
</div>
<div class="m-3">
        {{ $data->links() }}
</div>
@push('js')

    <script>

        Livewire.on('userupdate', () => {
            $('#updateModal').modal('hide');
            toastr.success('{!!  trans("site.updated_successfully") !!}');

        })
        Livewire.on('useradd', () => {
            $('#createModal').modal('hide');
            toastr.success('{!!  trans("site.added_successfully") !!}');

        })
        Livewire.on('deletionConfirm', () => {
            $('#ConfirmDeleteCost').modal('show');
        })

        Livewire.on('userdelete', () =>{
            $('#ConfirmDeleteCost').modal('hide');
            toastr.success('{!!  trans("site.deleted_successfully") !!}');
        })


    </script>

@endpush
