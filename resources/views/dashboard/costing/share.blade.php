<style>
    body {
        font-family: sans-serif;
    }
</style>
<div style="text-align: center">{{ $proposal->client['name']}}</div>

<labe>@lang('site.opportunity_name') :</labe>
<span style="display: inline-block">{{$opportunity->name}}</span><br>
<!--start of client details-->

<h4 for="" style="font-weight: bold">@lang('site.client_details')</h4>
<label>@lang('site.client_name') : </label>
<span>{{$proposal->client['name']}}</span><br>


<label>@lang('site.street_address') : </label>
<span>{{$proposal->client->address->street ?? '-'}}</span><br>


<label>@lang('site.phone') : </label>
<span>{{$proposal->client['phone1']}}</span><br>


<label>@lang('site.city_zip_code') : </label>
<span>{{$proposal->client->address->zip_code ?? '-'}}</span><br>


<label>@lang('site.date') :</label>
<span>{{$proposal['date']}}</span><br>


<!--end of client details-->

<label>@lang('site.deliverables') :</label>
<span>
        <ul class="list-group">
            @foreach($proposal->deliverables as $deliverable)
                <li class="list-group-item">
                    {{\App\Models\Deliverable::deliverables()[$deliverable]}}
                </li>
            @endforeach
        </ul>
</span>



<label>@lang('site.technologies') :</label>
<span>
    <ul class="list-group">
        @foreach($proposal->technologies as $technology)
            <li class="list-group-item">
            {{\App\Models\Technology::technologies()[$technology]}}
            </li>
        @endforeach
    </ul>
</span>

<label>@lang('site.Costing') :</label>
<!--
    <span>
    <table class="table border">
    <thead>
    <tr>
        <th scope="col">@lang('site.resource')</th>
        <th scope="col">@lang('site.estimation')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($proposal->resources as $resource)
        <tr>
            <td>{{$resource->name}}</td>
            <td>{{$resource->pivot->estimation}} Days</td>
        </tr>
        @endforeach
    </tbody>
</table>
</span>
!-->
<span>
    <table class="table border">
    <thead>
    <tr>
        <th scope="col">@lang('site.discount')</th>
        <th scope="col">@lang('site.margin')</th>
        <th scope="col">@lang('site.totalprice')</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$proposal->cost->discount}}</td>
            <td>{{$proposal->cost->margin}}</td>
            <td>{{$proposal->cost->totalprice}}</td>
        </tr>
    </tbody>
</table>
</span>
    </div>