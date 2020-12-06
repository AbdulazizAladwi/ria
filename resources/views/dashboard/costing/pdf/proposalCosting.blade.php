<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIA</title>
<link rel="stylesheet" href="{{ asset('dashboard') }}/css/print.css" />
</head>
    <body>
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
<div class="doc-body" style="position: relative;z-index: 1009;">
<h1 style="text-transform:capitalize;text-align:center;">
    عرض سعر
<br>
    proposal
<br>
</h1>
<table class="table-plain mb-4">
    <tr>
        <th class="align-left">delivery note#:</th>
        <td class="align-left">55555</td>
        <td class="align-right">5555</td>
        <th class="align-right">وصل تسليم رقم:</th>
                                </tr>
                                <tr class="border-bottom">
                                    <th class="align-left">date:</th>
                                    <td class="align-left">{{$proposal['created_at']}}</td>
                                    <td class="align-right">{{$proposal['created_at']}}</td>
                                    <th class="align-right">التاريخ:</th>
                                </tr>
                                <tr>
                                    <th colspan="2" class="align-left">to</th>
                                    <th colspan="2" class="align-right">الي</th>
                                </tr>
                                <tr>
                                    <th class="align-left">company name:</th>
                                    <td class="align-left">{{$proposal->client['name']}}</td>
                                    <td class="align-right">{{$proposal->client['name']}}</td>
                                    <th class="align-right">اسم الشركة:</th>
                                </tr>
                                <tr>
                                    <th class="align-left">street address:</th>
                                    <td class="align-left">{{$proposal->client->address->street ?? '-'}}</td>
                                    <td class="align-right">{{$proposal->client->address->street ?? '-'}}</td>
                                    <th class="align-right">اسم الشارع:</th>
                                </tr>
                                <tr>
                                    <th class="align-left">city, zip code:</th>
                                    <td class="align-left">{{$proposal->client->address->zip_code ?? '-'}}</td>
                                    <td class="align-right">{{$proposal->client->address->zip_code ?? '-'}}</td>
                                    <th class="align-right">المدينة و الرمز البريدي:</th>
                                </tr>
                                <tr class="border-bottom">
                                    <th class="align-left">phone number:</th>
                                    <td class="align-left">{{$proposal->client['phone1']}}</td>
                                    <td class="align-right">{{$proposal->client['phone1']}}</td>
                                    <th class="align-right">رقم الهاتف:</th>
                                </tr>
                            </table>


                            <table class="mb-4">
                                <tbody>
                                    <tr>
                                            <td>discount (نسبة الخصم):</td>
                                            <td>{{$proposal->cost->discount}}%</td>
                                            <td colspan="2"><div class="badge-lg">total due (اجمالي المستحق): {{$proposal->cost->totalprice}} KD</div></td>
                                        </tr>
                                    <tr>
                                        <td>margin:</td>
                                        <td>{{$proposal->cost->margin}}%</td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- <table class="mb-4">
                                <tr>
                                    <td colspan="2"><div class="badge-lg">total due (السعر بعد الخصم): {{$proposal->cost->totalprice}}</div></td>
        
                                </tr>
                                <tr>
                                    <td>discount (نسبة الخصم):</td>
                                    <td>{{$proposal->cost->discount}}%</td>
                                </tr>
                                <tr>
                                    <td>margin :</td>
                                    <td>{{$proposal->cost->margin}}%</td>
                                </tr>
                            </table> -->
                            
                            <table class="text-center ">
                                <tr>
                                    <td>thank you for your trust</td>
                                    <td>شكرا علي ثقتك بنا</td>
                                </tr>
                            </table>
                            <div class="page-break"></div>
        
                            <h3 class="text-primary font-weight-bold text-capitalize">proposed features for ({{$opportunity->name}}):</h3>
                            <div class="features">
                                <!-- Features goes here -->
                                {!! $proposal->features !!}
                            </div>
        
                            <h3 class="text-primary font-weight-bold text-capitalize">@lang('site.deliverables'):</h3>
                            <p class="text-primary">- As a reasult of mentioned fetures, you will receive the following:</p>
                            <ul class="list-group">
                                @foreach($proposal->deliverables as $deliverable)
                                    <li class="list-group-item">
                                        {{\App\Models\Deliverable::deliverables()[$deliverable]}}
                                    </li>
                                @endforeach
                            </ul>
                            <h3 class="text-primary font-weight-bold text-capitalize">@lang('site.technologies'):</h3>
                            <ul class="list-group">
                                @foreach($proposal->technologies as $technology)
                                    <li class="list-group-item">
                                    {{\App\Models\Technology::technologies()[$technology]}}
                                    </li>
                                @endforeach
                            </ul>
                            <h3 class="text-primary font-weight-bold text-capitalize">@lang('site.resource'):</h3>
                            <ul class="list-group">
                                @foreach($proposal->resources as $resource)
                                    <li class="list-group-item">
                                    {{$resource->name}}
                                    </li>
                                @endforeach
                            </ul>
                            <h3 class="text-primary font-weight-bold text-capitalize">@lang('site.timeline') :</h3>
                            <table class="table-primary">
                                <thead>
                                    <tr>
                                        <th>@lang('site.resource')</th>
                                        <th>@lang('site.estimation')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($proposal->resources as $resource)
                                        <tr>
                                            <td>{{$resource->name}}</td>
                                            <td>{{$resource->pivot->estimation}} {{$resource->estimation_types()[$resource->pivot->estimation_type]}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            
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
        
<script>
  window.onload = function () {
  this.print()
}
</script>
</body>
</html>