<?php

namespace App\Http\Controllers;

use App\Commands\CreateAccountCommand;
use App\Commands\DeleteAccountCommand;
use App\Commands\UpdateAccountCommand;
use App\Handlers\UpdateAccountHandler;
use App\Models\Account;
use App\Http\Requests\UpdateAccountRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Bus;

class AccountsController extends Controller
{
    public function index()
    {
        $accounts = Account::where('user_id', Auth::user()->id)->get();

        return view('accounts.index', compact('accounts'));
    }

    public function store(Request $request)
    {
        Bus::dispatch(new CreateAccountCommand($request->name, Auth::user()->id));

        return back();
    }

    public function update(Account $account, UpdateAccountRequest $request)
    {
        Bus::dispatch(new UpdateAccountCommand($account, $request->amount, $request->adding()));

        return back();
    }

    public function destroy(Account $account)
    {
        Bus::dispatch(new DeleteAccountCommand($account));

        return back();
    }
}
