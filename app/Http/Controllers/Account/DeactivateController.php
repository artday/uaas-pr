<?php

namespace App\Http\Controllers\Account;

use App\Events\Account\Deactivate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\DeactivateStoreRequst;

class DeactivateController extends Controller
{
    public function index(){
        return view('account.deactivate.index');
    }

    /**
     * @param DeactivateStoreRequst $request
     * @internal param DeactivateStoreRequst $requst
     */
    public function store(DeactivateStoreRequst $request){
        $user = $request->user();
        event(new Deactivate($user));
        Auth::logout();
        $user->delete();
        return redirect()->route('home')->withSuccess('Your account has been deactivated.');
    }
}
