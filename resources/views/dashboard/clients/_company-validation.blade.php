
<div class="form-group {!! $errors->has('company_name.'.$n) ? ' has-error' : '' !!}">
    <div class="wrapper">
        <div class="row mb-3">
            <div class="col-md-12">@lang('site.sister_companies')<i class="icon-plus2 AddCompany"></i></div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <label for="">Company Name</label>
                <input type="text"  name="company_name[{{$n}}]" value="{{old('company_name')[$n] ?? ''}}" placeholder="@lang('site.company_name')" class="form-control">
                @error('company_name.*')
                <p style="color: #ae1c17">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">Company phone1</label>
                <input type="number"  name="company_phone1[{{$n}}]" value="{{old('company_phone1')[$n] ?? ''}}"  placeholder="@lang('site.company_phone1')" class="form-control">
                @error('company_phone1')
                <p style="color: #ae1c17">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="">Company phone2</label>
                <input type="number" name="company_phone2[{{$n}}]" value="{{old('company_phone2')[$n] ?? ''}}"  placeholder="@lang('site.company_phone2')" class="form-control">
                @error('company_phone2')
                <p style="color: #ae1c17">{{ $message }}</p>
                @enderror
            </div>
        </div>


        <div class="row mb-3">
            <div class="col-md-6">
                <label for="">Company Email1</label>
                <input type="email" name="company_email1[{{$n}}]" value="{{old('company_email1')[$n] ?? ''}}"  placeholder="@lang('site.company_email1')" class="form-control">
                @error('company_email1')
                <p style="color: #ae1c17">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="">Company Email2</label>
                <input type="email"  name="company_email2[{{$n}}]" value="{{old('company_email2')[$n] ?? ''}}"  placeholder="@lang('site.company_email2')" class="form-control">
                @error('company_email2')
                <p style="color: #ae1c17">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <a href="" class="remove">Remove</a>

    </div>
</div>

