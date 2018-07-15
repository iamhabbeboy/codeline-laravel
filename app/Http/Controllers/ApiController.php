<?php

namespace App\Http\Controllers;

use App\FilmModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    //
    protected $films;
    public function __construct()
    {
        $this->films = (new FilmModel);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function listing()
    {
        $films = $this->films->where('name', '!=', '')->paginate(1)->toArray();
        return response()->json($films);
    }

    /**
     * Undocumented function
     *
     * @return Array
     */
    public function create() : Array
    {
    }

    /**
     * Single film page with slug
     *
     * @param [type] $slug
     * @return void
     */
    public function single($slug)
    {
        $films = $this->films
            ->where('slug', $slug)->get();
        return response()->json($films);
    }

    public function authCheck()
    {
        $status = (Auth::check()) ? 'success' : 'failed';
        $resp   = [ 'status' => $status ];
        return response()->json($resp);
    }

    public function addComment(Request $request)
    {
        dd($request->username);
        // $username   = $request->username;
        // $comment    = $request->comment;
    }
}
