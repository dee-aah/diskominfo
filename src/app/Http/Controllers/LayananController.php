<?php

namespace App\Http\Controllers;

use App\Models\Program;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $programs = Program::with('layanans')->get();
        $programlain = Program::with('layanans')->skip(1)->take(3)->get();
        return view('layanans.index', compact('programs','programlain'));
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

}
