<?php

namespace App\Http\Controllers\Admin;

use App\Sua;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suas = Sua::all();
        return view('admin.sua.index', compact('suas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sua  $sua
     * @return \Illuminate\Http\Response
     */
    public function show(Sua $sua)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sua  $sua
     * @return \Illuminate\Http\Response
     */
    public function edit(Sua $sua)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sua  $sua
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sua $sua)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sua  $sua
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sua $sua)
    {
        //
    }
}
