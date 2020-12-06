<?php

namespace App\Console\Commands;

use App\Models\PaymentTerm;
use App\Repositories\Interfaces\InvoicesRepositoryInterface;
use App\Repositories\Interfaces\PaymentTermRepositoryInterface;
use Illuminate\Console\Command;

class UpdateTermStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:termStatus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this command is run to check and update if payment term time is over';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(PaymentTermRepositoryInterface $termRepository)
    {
        foreach ( $termRepository->all() as $term )
        {
            $check = $term->invoices()->paidInvoices()->sum('amount') == $term->amount;

            if ( today() >= $term->date and !$check )
            {
                $term->update([
                    'status' => PaymentTerm::DELAYED
                ]);
            }
        }
    }
}
