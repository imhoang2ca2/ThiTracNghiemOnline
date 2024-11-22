<?php

namespace App\Helpers;
use App\Http\Responses\Api;
use App\Mail\GeneralMail;
use App\Jobs\SendMailJob;
use Auth,DB;
use App\Models\Transaction;


class MailHelper
{
    /**
     * Send mail sign up
     *
     * @param Transaction $transaction
     */
    public static function sendMail($data)
    {
        //Send mail

        $mailJob = new GeneralMail();
        $mailJob->setFromDefault()
            ->setView('emails.notification', $data)
            ->setSubject($data['subject'])
            ->setTo($data['email']);
        dispatch(new SendMailJob($mailJob));
    }

}
