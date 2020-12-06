
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIA-Invoice</title>

    <link rel="stylesheet" href="<?php echo e(asset('css/prints/print.css')); ?>" />

</head>
<body>
<div id="letter-bg" style="width:100vw;height:100vh;position: fixed;top:0;left:0;">
    <img src="<?php echo e(asset('css/prints/images/bg.png')); ?>" style="height:100%;width:100%;">
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
                    فاتورة
                    <br>
                    invoice
                    <br>
                </h1>

                <table class="table-plain mb-4">
                    <tr>
                        <th class="align-left">invoice:</th>
                        <td class="align-left"><?php echo e($invoice->number); ?></td>
                        <td class="align-right"><?php echo e($invoice->number); ?></td>
                        <th class="align-right">فاتورة رقم:</th>
                    </tr>
                    <tr class="border-bottom">
                        <th class="align-left">date:</th>
                        <td class="align-left"><?php echo e($invoice->created_at); ?></td>
                        <td class="align-right"><?php echo e($invoice->created_at); ?></td>
                        <th class="align-right">التاريخ:</th>
                    </tr>
                    <tr>
                        <th colspan="2" class="align-left">to</th>
                        <th colspan="2" class="align-right">الي</th>
                    </tr>
                    <tr>
                        <th class="align-left">company name:</th>
                        <td class="align-left"><?php echo e($invoice->client->name); ?></td>
                        <td class="align-right"><?php echo e($invoice->client->name); ?></td>
                        <th class="align-right">اسم الشركة:</th>
                    </tr>
                    <tr>
                        <th class="align-left">street address:</th>
                        <td class="align-left"><?php echo e($invoice->client->address()->street ?? '-'); ?></td>
                        <td class="align-right"><?php echo e($invoice->client->address()->street ?? '-'); ?></td>
                        <th class="align-right">اسم الشارع:</th>
                    </tr>
                    <tr>
                        <th class="align-left">city, zip code:</th>
                        <td class="align-left"><?php echo e($invoice->client->address()->zip_code ?? '-'); ?></td>
                        <td class="align-right"><?php echo e($invoice->client->address()->zip_code ?? '-'); ?></td>
                        <th class="align-right">المدينة و الرمز البريدي:</th>
                    </tr>
                    <tr>
                        <th class="align-left">phone number:</th>
                        <td class="align-left"><?php echo e($invoice->client->phone1 ?? '-'); ?></td>
                        <td class="align-right"><?php echo e($invoice->client->phone1 ?? '-'); ?></td>
                        <th class="align-right">رقم الهاتف:</th>
                    </tr>
                    <tr>
                        <th class="align-left">sales person:</th>
                        <td class="align-left">name here</td>
                        <td class="align-right">الاسم هنا</td>
                        <th class="align-right">مسئول مبيعات:</th>
                    </tr>
                    <tr class="border-bottom">
                        <th class="align-left">P.O. number:</th>
                        <td class="align-left">000000</td>
                        <td class="align-right">00000</td>
                        <th class="align-right">رقم طلب الشراء:</th>
                    </tr>
                </table>

                <table class="table-primary text-center mb-4">
                    <thead>
                    <tr>
                        <th>
                            quantity<br>
                            الكمية
                        </th>
                        <th>
                            description<br>
                            الوصف
                        </th>
                        <th>
                            unit price<br>
                            سعر الوحدة
                        </th>
                        <th>
                            total<br>
                            الاجمالي
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td><?php echo e($invoice->notes); ?></td>
                        <td></td>
                        <td><?php echo e($invoice->amount); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>

                <table class="mb-4">
                    <tr>
                        <td>sub total (السعر قبل الخصم): <?php echo e($invoice->amount); ?></td>
                    </tr>
                    <tr>
                        <td>discount (نسبة الخصم): 0.00%</td>
                    </tr>
                </table>


                <table class="mb-4 table-pad">
                    <tr>
                        <td>
                            <table class="table-pad bg-primary-light">
                                <tr>
                                    <td colspan="2" class="text-primary">bank account details:</td>
                                </tr>
                                <tr>
                                    <th class="text-initial">bank name:</th>
                                    <td>national bank of kuwait</td>
                                </tr>
                                <tr>
                                    <th class="text-initial">account name:</th>
                                    <td>roqay company wll</td>
                                </tr>
                                <tr>
                                    <th class="text-initial">account No:</th>
                                    <td>000000</td>
                                </tr>
                                <tr>
                                    <th class="text-initial">Iban No:</th>
                                    <td>0000</td>
                                </tr>
                            </table>
                        </td>
                        <td class="text-center">
                            <div class="badge-lg">total due (اجمالي المستحق): 00000</div>
                            <p>make all cheques payable,</p>
                            <p>for roqay it consulting</p>
                            <p>اجعل جميع الشيكات قابلة للدفع لشركة</p>
                            <p>رقي لاستشارات تقنية المعلومات</p>
                        </td>
                    </tr>
                </table>

                <table class="text-center">
                    <tr>
                        <td>thank you for your trust</td>
                        <td>شكرا علي ثقتك بنا</td>
                    </tr>
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



<?php /**PATH F:\laravel-projects\ria\resources\views/dashboard/invoices/prints/invoice.blade.php ENDPATH**/ ?>
