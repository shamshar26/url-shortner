<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $shortLinks = ShortLink::all(); // Fetch the short links data, adjust this query as per your requirements
        return view('shortenLink', ['shortLinks' => $shortLinks]); // Pass the $shortLinks data to the view
    }
}
