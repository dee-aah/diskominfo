<?php

namespace App\Http\Controllers;

use App\Models\Tupoksi;
use App\Models\Uraian_tugas;
use Illuminate\Http\Request;

class tupoksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uraians = Uraian_tugas::all();
        $tupoksi = Tupoksi::first();
        return view('tupoksi.index',compact('tupoksi','uraians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
