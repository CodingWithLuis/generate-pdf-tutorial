<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;

class UserController extends Controller
{
    /**
     * Return Users data to users view
     *
     * @return void
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Export content to PDF with View
     *
     * @return void
     */
    public function downloadPdf()
    {
        $users = User::all();

        /* view()->share('users.pdf', $users); */

        $pdf = PDF::loadView('users.pdf', ['users' => $users]);

        return $pdf->download('users.pdf');
    }
}
