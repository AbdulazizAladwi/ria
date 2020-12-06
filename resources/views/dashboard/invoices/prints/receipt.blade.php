
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIA-Receipt</title>

    <link rel="stylesheet" href="{{url('css/prints/print.css')}}" />

</head>
<body style="margin: 0;">
<table class="mb-4">
    <thead>
    <tr>
        <td>
            <div class="print-head" style="">
                <img src="{{url('css/prints/images/head.png')}}" style="width:100%;height:100%;" alt="">
            </div>
        </td>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>
            <div class="doc-body" style="position: relative;z-index: 1009;background: url(body.png) no-repeat 50% 50%;background-size: 50% auto;">
                <h1 style="text-transform:capitalize;text-align:center;">
                    سند قبض
                    <br>
                    receipt voucher
                    <br>
                </h1>

                <table class="mb-4">
                    <tr>
                        <td>
                            <p>serial number / الرقم المتسلسل</p>
                            <div class="plain-box text-center" style="padding-top: 5px">{{$receipt->number}}</div>
                        </td>
                        <td class="align-right">
                            <p>date / التاريخ</p>
                            <div class="plain-box text-center" style="padding-top: 5px">{{$receipt->date}}</div>
                        </td>
                    </tr>
                </table>
                <table class="table-pad nowrap">
                    <tr>
                        <th class="align-left">received form:</th>
                        <td>
                            <div class="dots-blk">
                                {{$receipt->invoice->paymentTerm->opportunity->client->name}}
                            </div>
                        </td>
                        <th class="align-right">استلمنا من: </th>
                    </tr>
                    <tr>
                        <th class="align-left">the amount of:</th>
                        <td>
                            <div class="dots-blk">
                                {{$receipt->invoice->amount}} @lang('site.currency')
                            </div>
                        </td>
                        <th class="align-right">مبلغ و قدره:</th>
                    </tr>
                    <tr>
                        <th class="align-left">for:</th>
                        <td>
                            <div class="dots-blk">
                                {{ $receipt->invoice->paymentTerm->name }}
                            </div>
                        </td>
                        <th class="align-right">و ذالك عن:</th>
                    </tr>
                </table>

                <table class="table-pad">
                    <tr>
                        <td>
                            <div class="dots-blk">
                                .......................................................................................................................................
                                .......................................................................................................................................
                            </div>
                        </td>
                        <td class="nowrap">
                            شيك رقم:
                            <br>
                            cheque No:
                        </td>
                        <td>
                            <div class="check-blk">
                                شيك
                                <br>
                                cheque
                            </div>
                        </td>
                        <td>
                            <div class="check-blk">
                                نقدا
                                <br>
                                cash
                            </div>
                        </td>
                    </tr>

                </table>

                <table class="text-center table-pad">
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td class="align-left">manager:</td>
                                    <td class="align-right">المدير</td>
                                </tr>
                            </table>
                            <div class="dots-blk mt-2">
                                ...........................................................
                            </div>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td class="align-left">accountant:</td>
                                    <td class="align-right">المحاسب</td>
                                </tr>
                            </table>
                            <div class="dots-blk mt-2">
                                ...........................................................
                            </div>
                        </td>
                        <td>
                            <table>
                                <tr>
                                    <td class="align-left">collected by:</td>
                                    <td class="align-right">المحصل</td>
                                </tr>
                            </table>
                            <div class="dots-blk mt-2">
                                ...........................................................
                            </div>
                        </td>
                    </tr>
                </table>

            </div>
        </td>
    </tr>
    </tbody>
    <tfoot>
    <tr>
        <td>
            <div class="print-foot" style="">
                <img src="{{url('css/prints/images/foot.png')}}" style="width:100%;height:100%;" alt="">
            </div>
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



