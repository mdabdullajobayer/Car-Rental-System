<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CarPurchaseUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $purchaseDetails;

    public function __construct($purchaseDetails)
    {
        $this->purchaseDetails = $purchaseDetails;
    }

    public function build()
    {
        return $this->view('Mail.car_purchase_user')
            ->subject('Car Purchase Confirmation')
            ->with('details', $this->purchaseDetails);
    }
}
