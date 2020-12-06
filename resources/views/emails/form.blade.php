<!-- Modal For Mail -->
 <div class="modal" id="myModal_{{$row->id}}">
  <div class="modal-dialog" role="document">
    <div class="modal-content">  
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">@lang('site.email')</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <form action="{{route('dashboard.post',$row->id)}}" method="post">
      {{csrf_field()}}
     <input type="hidden" value = "{{$row->id}}" name= "proposal_id">
      <label for="">@lang('site.email') :</label>
      @error('email')<p class="text-danger">{{ $message }}</p>
      @enderror
      <input type="email" class="form-control" name="email" required>
      </div>      
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">@lang('site.close')</button>
        <button type="submit" class="btn btn-secondary" id="save">@lang('site.save')</button>
      </div>
      </form>
    </div>
  </div>
</div>
