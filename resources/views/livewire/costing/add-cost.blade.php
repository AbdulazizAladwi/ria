<div class="card">
    <div class="card-body">
        <div class="mb-4 d-md-flex justify-content-between align-items-center">
            <h6 class="mb-0"><b>@lang('site.opportunity_name') :</b> {{$proposal->requirement->opportunity->name}}</h6>
            <p class="mb-0"><b>@lang('site.date'):</b> {{$proposal->date}}</p>
        </div>

        <h6><b>@lang('site.resource_cost'):</b></h6>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>@lang('site.resource')</th>
                        <th>@lang('site.estimation')</th>
                        <th>@lang('site.cost')</th>
                    </tr>
                </thead>
                <tbody>
                @php 
                $directCost = 0;
                @endphp
                @foreach($proposal->resources as $resource)
                <tr>
                    <td>{{$resource->name}}</td>
                    <td>{{$resource->pivot->estimation}} Days</td>
                    @php $projCost = number_format((float)$total= ($resource->price / $days->days)*($resource->pivot->estimation), 2, '.', '');
                    $directCost +=$projCost;
                    @endphp
                    <td>{{$projCost}} KD</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>   
        <!------------------Utilities------------------------>
        <h6><b>@lang('site.utilities')</b></h6>
        <!-----------------Choose Other------------------------>
        <h6><b>@lang('site.other') :</b></h6>

        <div class="row mb-3">
            @foreach($costs as $cost)
            @if($cost->type == 'Other')
            <div class="col-md-3">
            <input type="checkbox" name="Other" value="{{$cost->cost}}" onClick="other(this);"/>
            <label for="">{{$cost->name}}</label>
            </div>
            @endif
            @endforeach
        </div>

        <!-----------------Choose Indirect------------------------>
        <h6><b>@lang('site.indirect') :</b></h6>
        <div class="row mb-3">
            @foreach($costs as $cost)
            @if($cost->type == 'Indirect')
            <div class="col-md-3">
            <input type="checkbox" name="Indirect" value="{{$cost->cost}}" onClick="indirect(this);"/>
            <label>{{$cost->name}}</label>
            </div>
            @endif
            @endforeach
        </div>

        <!---------------------Calculate Cost------------------------->
        @include('layout.errormsg')
        <form action="{{route('dashboard.costing.store',$proposal->id)}}" method="post">
            {{csrf_field()}}
            <div class="p-2 bg-light mb-3" id="new_prescription_form">
                <p><b>@lang('site.direct_cost'):</b> {{$directCost}} KD</p>
                <p><b>@lang('site.other') :</b><span id="TotalOther"></p>
                <p><b>@lang('site.indirect') :</b> <span id="TotalIndirect"></p>
                <p><b>@lang('site.total_cost') :</b> <span id="TotalCost"></p>
                <table>
                    <tr>
                        <td>
                        <b>@lang('site.margin') :</b> 
                        </td>
                        <td>
                        <input onblur="findTotal()" type="text" name="margin" class="margin form-control" id="margin1" value="{{old('margin')}}"/>
                        </td>
                        <td>%</td>
                    </tr>
                    <tr>
                        <td>
                        <b>@lang('site.discount') :</b>
                        </td>
                        <td>
                        <input onblur="finddis()" type="text" name="discount" class="margin form-control" id="margin2" value="{{old('discount')}}"/>
                        </td>
                        <td>%</td>
                    </tr>
                    <tr>
                        <td>
                        <b>@lang('site.total_project_price') :</b>
                        </td>
                        <td>
                        <input type="text" name="total" class="form-control" id="total"/>
                        </td>
                        <td>KD</td>
                    </tr>
                </table>
                <!-- <p><b>@lang('site.margin') :</b><input onblur="findTotal()" type="text" name="margin" class="margin" id="margin1" value="{{old('margin')}}" required/>%</p>
                <p><b>@lang('site.discount') :</b><input onblur="finddis()" type="text" name="discount" class="margin" id="margin2" value="{{old('discount')}}" required/>%</p>
                <p><b>@lang('site.total_project_price') :</b><input type="text" name="total" id="total"/>KD</p> -->
            </div>
            <!-- <hr> -->
            <div class="p-2 bg-light mb-3">
                <h6><b>@lang('site.summary') :</b></h6>
                <p><b>@lang('site.client_details') :</b></p>
                <span><b>@lang('site.client_name'): </b> {{$proposal->client->name}}</span>
                <span><b>@lang('site.street_address'): </b> {{$proposal->client->address->area}} <b>,</b> {{$proposal->client->address->street}} <b>,</b> {{$proposal->client->address->block}}</span>
                <br><br>
                <span><b>@lang('site.phone_number'): </b> {{$proposal->client->phone1}} <b>,</b> {{$proposal->client->phone2}}</span>
                <span><b>@lang('site.city_zip_code'): </b> {{$proposal->client->address->zip_code}}</span>
            </div>
            <!-- <br> -->

            
            <!-- <br> -->
            <div class="p-2 bg-light mb-3">
                <h6><b>@lang('site.deliverables') :</b></h6>
                <ol>
                    @foreach($proposal->deliverables as $index=>$deliverable)
                        <li>{{ \App\Models\Deliverable::deliverables()[$deliverable] }}</li>
                    @endforeach
                </ol>
            </div>
            <!-- <br> -->
            <div class="p-2 bg-light mb-3">
                <h6><b>@lang('site.technologies') :</b></h6>
                <ol>
                    @foreach($proposal->technologies as $index=>$technology)
                        <li>{{ \App\Models\Technology::technologies()[$technology] }}</li>
                    @endforeach
                </ol>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-secondary btn-sm">@lang('site.save')</button>               
            </div>
        </form>

    </div>
</div>
<script type="text/javascript">
    //================TotalOther=====================
    var totalOther = 0;
    function other(other){
        if(other.checked){
            totalOther+= parseInt(other.value);
        }else{
            totalOther-= parseInt(other.value);
        }
        //alert(total);
        document.getElementById('TotalOther').innerHTML = totalOther + " KD";
        document.getElementById('TotalCost').innerHTML = totalIndirect + totalOther + {{number_format((float)$directCost, 2, '.', '')}} + " KD";
    }
    //================totalIndirect=====================
    var totalIndirect = 0;
    function indirect(indirect){
        if(indirect.checked){
            totalIndirect+= parseInt(indirect.value);
        }else{
            totalIndirect-= parseInt(indirect.value);
        }
        document.getElementById('TotalIndirect').innerHTML = totalIndirect + " KD";
        document.getElementById('TotalCost').innerHTML = totalIndirect + totalOther + {{number_format((float)$directCost, 2, '.', '')}} + " KD";
    }
    //==================Margin======================
    function findTotal(){
        var arr = document.getElementsByClassName('margin');
        var tot=0;
        for(var i=0;i<arr.length;i++){
            if(parseInt(arr[i].value))
                tot += parseInt(arr[i].value);
        }
        document.getElementById('total').value = (totalIndirect + totalOther + {{number_format((float)$directCost, 2, '.', '')}}) * (1-(tot/100)) ;
    }
    //==================Discount======================
    function finddis(){
        var arr = document.getElementsByClassName('margin');
        var tot=0;
        for(var i=0;i<arr.length;i++){
            if(parseInt(arr[i].value))
                tot += parseInt(arr[i].value);
        }
        document.getElementById('total').value = (totalIndirect + totalOther + {{number_format((float)$directCost, 2, '.', '')}}) * (1-(tot/100)) ;
    }
</script>