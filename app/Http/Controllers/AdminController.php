<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use App\User;


class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('isAdmin');
    }

    //
    public function index(UsersExport $usersExport) {        
        $users = $usersExport->collection();
        return view('admin.index', compact('users'));
    }

    public function download() {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
