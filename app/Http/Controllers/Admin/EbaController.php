<?php

namespace App\Http\Controllers\Admin;

use App\Eba;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EbaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ebas = Eba::all();
        return view('admin.eba.index', compact('ebas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'desde' => 'required',
            'hasta' => 'required',
            'periodo' => 'required|max:6',
            'pdf' => 'required|mimes:pdf'
        ]);
        $this->authorize('create', new Eba);

        $eba = Eba::create($request->except('pdf'));
        if ($request->hasFile('pdf'))
        {
            $file = $request->file('pdf');
            $path = public_path() . '/area_legal/eba';
            $fileName = uniqid() .'-'. $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            if ($moved)
                {
                    $eba->pdf = $fileName;
                    $eba->save();
                }
        }

         return redirect()->route('admin.ebas.index', compact('eba'))->with('info', 'Agregado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eba  $eba
     * @return \Illuminate\Http\Response
     */
    // public function show(Eba $eba)
    // {
    //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eba  $eba
     * @return \Illuminate\Http\Response
     */
    public function edit(Eba $eba)
    {
        $this->authorize('update', $eba);
        return view('admin.eba.edit', compact('eba'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eba  $eba
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eba $eba)
    {
        $this->validate($request, [
            'desde' => 'required',
            'hasta' => 'required',
            'periodo' => 'required|max:6|min:1',
            'pdf' => 'required|mimes:pdf'
        ]);
        $this->authorize('update', $eba);
        File::delete('area_legal/eba/'.$eba->pdf);
        $eba->update($request->except('pdf'));
        if ($request->hasFile('pdf'))
        {
            $file = $request->file('pdf');
            $path = public_path() . '/area_legal/eba';
            $fileName = uniqid() .'-'. $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            if ($moved)
                {
                    $eba->pdf = $fileName;
                    $eba->save();
                }
        }

        return redirect()->route('admin.ebas.index', compact('eba'))->with('info', 'Datos Actualizados Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eba  $eba
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eba $eba)
    {
        $this->authorize('delete', $eba);
        $eba->delete();
        File::delete('area_legal/eba/'.$eba->pdf);
        return back()->with('info', 'La publicacion a sido Eliminada');
    }
}
