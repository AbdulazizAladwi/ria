<div class="card">
    <div class="card-body">
        
        <div class="mb-4 d-md-flex justify-content-between align-items-center">
            <h6 class="mb-0"><b>@lang('site.opportunity_name') :</b> {{$proposal->requirement->opportunity->name}}</h6>
            <p class="mb-0"><b>@lang('site.date') :</b> {{$proposal->date}}</p>
        </div>
        <h6>@lang('site.resource_cost')</h6>

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
                    <td>{{$resource->pivot->estimation}} @lang('site.day')</td>
                    @php $projCost = number_format((float)$total= ($resource->price / $days->days)*($resource->pivot->estimation), 2, '.', '');
                    $directCost +=$projCost;
                    @endphp
                    <td>{{$projCost}} KD</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!---------------------Calculate Cost------------------------->
        <form action="{{route('dashboard.costing.update',$proposal->id)}}" method="post">
            {{csrf_field()}}
            <div id='DivIdToPrint'>
                <div class="p-2 bg-light mb-3" id="new_prescription_form">
                    <p><b>@lang('site.total_cost') :</b>{{number_format((float)$price= (($proposal->cost->totalprice)/(1-(($proposal->cost->discount)+($proposal->cost->margin))/100)), 2, '.', '')}} KD</p>
                    
                    <table>
                        <tr>
                            <td>
                            <b>@lang('site.margin') :</b> 
                            </td>
                            <td>
                            <input onblur="findTotal()" type="text" class="margin form-control" name="margin" id="margin1" value="{{$proposal->cost->margin}}"/>
                            </td>
                            <td>%</td>
                        </tr>
                        <tr>
                            <td>
                            <b>@lang('site.discount') :</b>
                            </td>
                            <td>
                            <input onblur="finddis()" type="text" class="margin form-control" name="discount" id="margin2" value="{{$proposal->cost->discount}}"/>
                            </td>
                            <td>%</td>
                        </tr>
                        <tr>
                            <td>
                            <b>@lang('site.total_project_price') :</b>
                            </td>
                            <td>
                            <input type="text" name="total" class="form-control" id="total" value="{{$proposal->cost->totalprice}}"/>
                            </td>
                            <td>KD</td>
                        </tr>
                    </table>
                    
                    <!-- <p><b>@lang('site.margin') :</b><input onblur="findTotal()" type="text" class="margin" name="margin" id="margin1" value="{{$proposal->cost->margin}}"/>%</p>
                    <p><b>@lang('site.discount') :</b><input onblur="finddis()" type="text" class="margin" name="discount" id="margin2" value="{{$proposal->cost->discount}}"/>%</p>
                    <p><b>@lang('site.total_project_price') :</b><input type="text" name="total" id="total" value="{{$proposal->cost->totalprice}}"/>KD</p> -->
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
                <!-- <p><b>@lang('site.date') :</b> {{$proposal->date}}</p> -->
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
            </div>
            <div class="d-flex justify-content-end">
                {{-- <button type="button" class="btn btn-dark btn-sm mx-1" id='btn' value='Print' onclick='printDiv();'>@lang('site.print')</button> --}}
                <button type="submit" class="btn btn-secondary btn-sm">@lang('site.save')</button> 
            </div>
        </form>
    </div>
</div>



<script type="text/javascript">
//==================Margin======================
function findTotal(){
    var arr = document.getElementsByClassName('margin');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('total').value = ({{number_format((float)$price, 2, '.', '')}}) * (1-(tot/100)) ;
}
//==================Discount======================
function finddis(){
    var arr = document.getElementsByClassName('margin');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('total').value = ({{number_format((float)$price, 2, '.', '')}}) * (1-(tot/100)) ;
}
//====================Print============================
function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write(`
    <html>
    <body class="printDiv" onload="window.print()">
    <link rel="stylesheet" href="{{ asset('dashboard') }}/css/print.css" />
    <div id="letter-bg" style="width:100vw;height:100vh;position: fixed;top:0;left:0;">
        <img src="{{ asset('dashboard') }}/img/print-bg.png" style="height:100%;width:100%;">
    </div>
    <table>
    <thead>
    <tr>
        <td>
            <div class="print-head" style=""></div>
        </td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            <div class="doc-body m-0" style="position: relative;z-index: 1009;">
            `+divToPrint.innerHTML+`
            </div>
        </td>
        </tr>
        </tbody>
        <tfoot>
        <tr>
            <td>
                <div class="print-foot" style=""></div>
            </td>
        </tr>
        </tfoot>
    </table>
    </body>
    </html>
    
    `);
//   newWin.document.close();
//   setTimeout(function(){newWin.close();},10);

}
/*
function printDiv(divName) {
 //alert('s');
 var printContents = '<div id="print-content"><form><table width="30%"><tbody>';
  var inputs, index;

inputs = document.getElementsByTagName('input');
for (index = 0; index < inputs.length - 1; ++index) {

   var fieldName = inputs[index].name;
   var fieldValue = inputs[index].value;

  printContents +='<tr><td><label>'+fieldName+'</label></td>';
  printContents +='<td>'+fieldValue+'</td></tr>';
}

var z = 3; // if you had more labels remeber to change this value 
inputs = document.getElementsByTagName('textarea');
for (index = 0; index < inputs.length; ++index) {

   //var fieldName = inputs[index].name;
    var fieldName = document.getElementsByTagName('label')[z].textContent;
   var fieldValue = inputs[index].value;

  printContents +='<tr><td colspan="2"><label>'+fieldName+'</label><br>'+fieldValue+'</td></tr>';
++z;
}

   printContents +='</tbody></table>';

 w=window.open();
 w.document.write(printContents);
 w.print();
 w.close();
}*/
</script>
