<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Events\Account\PasswordUpdate;
use App\Http\Requests\Account\PasswordStoreRequest;

class PasswordController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('account.password.index');
    }

    /**
     * @param PasswordStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PasswordStoreRequest $request)
    {
        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);
        event(new PasswordUpdate($request->user()));
        return redirect()->route('account.index');
    }
}
