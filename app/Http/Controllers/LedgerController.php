<?php

namespace App\Http\Controllers;

use App\Account;
use App\LedgerHelper;
use Illuminate\Http\Request;

class LedgerController extends Controller
{
    //
    public function showLedger(Request $request, Account $account)
    {
        $stats = LedgerHelper::accountStats($account);

        if($request->ajax()){
            return $stats;
        }

        return view('finance.ledger', compact('account', 'stats'));
    }

    public function stats(Account $account) {
        $transaction = LedgerHelper::record(Request::all(), $account);

        if(isset($transaction['error']))
            return $transaction;

        return LedgerHelper::accountStats($account);
    }

    public function summary(Account $account) {
        return LedgerHelper::summary($account);
    }

    public function transactions(Account $account) {
        return LedgerHelper::transactions($account);
    }

    public function getStats(Account $account) {
        return LedgerHelper::accountStats($account);
    }
}
