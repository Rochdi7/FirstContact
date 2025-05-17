<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        abort_if(!auth()->user()->can('access users'), 403);

       return view('admin.home');
    }

}
