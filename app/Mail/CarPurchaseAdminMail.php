<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CarPurchaseAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $purchaseDetails;

    public function __construct($purchaseDetails)
    {
        $this->purchaseDetails = $purchaseDetails;
    }

    public function build()
    {
        return $this->view('Mail.car_purchase_admin')
            ->subject('New Car Purchase Notification')
            ->with('details', $this->purchaseDetails);
    }
}
