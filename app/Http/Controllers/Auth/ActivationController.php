<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\ConfirmationToken;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\Auth\ToggleActivationLink;
use Illuminate\Foundation\Auth\RedirectsUsers;

class ActivationController extends Controller
{
    use RedirectsUsers;
    protected $redirectTo = '/account';
    public function activate(ConfirmationToken $token, Request $request)
    {
        $token->user->update([ 'activated' => true ]);
        $token->delete();
        Auth::loginUsingId($token->user->id);
        event(new ToggleActivationLink(Auth::user()));
        return redirect()->intended($this->redirectPath())->withSuccess('Activated! You\'re now signed in.');
    }

}
