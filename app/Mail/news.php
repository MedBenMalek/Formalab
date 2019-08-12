<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Formation;
use App\Actualite;
use Carbon;

class news extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $time = Carbon\Carbon::now();
        $formations = Formation::orderBy('created_at','desc')->where('end', '>', $time)->take(4)->get();
        $actualites = Actualite::with('formateur' ,'admin')->where('etat','active')->orderBy('created_at','desc')->take(4)->get();

        $address = 'benmalekchrif@gmail.com';
        $name = 'FormaLab';
        $subject = 'Les nouveautés de FormaLab';

        return $this->view('emails.newsletter', compact('formations', 'actualites'))
                ->from($address, $name)
                ->cc($address, $name)
                ->bcc($address, $name)
                ->replyTo($address, $name)
                ->subject($subject);
    }
}
