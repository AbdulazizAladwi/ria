<?php

namespace App\Observers;

use App\Models\PaymentTerm;
use App\Repositories\Interfaces\PaymentTermRepositoryInterface;
use Carbon\Carbon;

class PaymentTermObserver
{
//    public function created($term)
//    {
//        $date = $term['date'];
//
//        if ($date < today())
//        {
//           $term->update(['status' => '3']);
//        }
//        else
//        {
//            $term->update(['status' => '1']);
//        }
//
//    }
}
