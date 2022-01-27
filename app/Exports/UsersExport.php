<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class UsersExport implements FromView
{

    public function view(): View
    {
        $users = User::all();
        return view('layouts.backend.user.excel', [
            'users' => $users,
        ]);
    }
}
