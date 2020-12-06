<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Repositories\Interfaces\ProposalRepositoryInterface;
use App\Models\Proposal;
use App\Models\TotalCost;
use App\Models\Setting;

class ProposalMail extends Mailable
{
    use Queueable, SerializesModels;
    private $attachment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($attachment)
    {
        $this->attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
        return $this->view('emails.myDemoMail')
        ->attach(public_path($this->attachment), [
             'as' => 'proposal.pdf',
             'mime' => 'application/pdf',
        ]);


    }
}