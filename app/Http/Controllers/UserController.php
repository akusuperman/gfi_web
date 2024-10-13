<?php

namespace App\Http\Controllers;

use index;

//import Model Post

use App\Models\post;
use App\Models\user;

//return type View

use Illuminate\View\View;

//return type redirectResponse

use Illuminate\Http\Request;

//import Facade "Storage"

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * index
     *
     * @return View
     */

    public function index(): View
    {
        return view('client.index');
    }

    public function pegawai(): View
    {
        return view('pegawai');
    }

    public function tabel_user(): View
    {
        return view('tabel_user');
    }
}
