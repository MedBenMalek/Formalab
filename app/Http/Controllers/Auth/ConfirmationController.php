<?php

namespace App\Http\Controllers\Auth;

use App\Formateur;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use guard;

class ConfirmationController extends Controller
{

    use RegistersUsers;

    public function confirm($id, $token)
    {
        $formateur = Formateur::where('id', $id)->where('confirmation_token', $token)->first();

        if($formateur){
            $formateur->update(['confirmation_token' => null]);
            $this->guard()->login($formateur);
            return redirect('/formateur')->with('success','votre compte a bien été confirmé');

        } else {
            return redirect('/formateur/login')->with('error','ce lien ne semble plus valide');

        }
        
    }

}
