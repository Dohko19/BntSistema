<?php

namespace App\Http\Controllers\Admin;

use App\Ema;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;

class EmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emas = Ema::all();
        return view('admin.ema.index', compact('emas'));
    }

    // *
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response

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
            'periodo' => 'required',
            'pdf' => 'required|mimes:pdf'
        ]);
        $this->authorize('create', new Ema);
        $ema = Ema::create($request->except('pdf'));
        if ($request->hasFile('pdf'))
        {
            $file = $request->file('pdf');
            $path = public_path() . '/area_legal/ema';
            $fileName = uniqid() .'-'. $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            if ($moved)
                {
                    $ema->pdf = $fileName;
                    $ema->save();
                }
        }

         return redirect()->route('admin.emas.index', compact('ema'))->with('info', 'Agregado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ema  $ema
     * @return \Illuminate\Http\Response
     */
    // public function show(Ema $ema)
    // {
    //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ema  $ema
     * @return \Illuminate\Http\Response
     */
    public function edit(Ema $ema)
    {
        $this->authorize('update', $ema);
        return view('admin.ema.edit', compact('ema'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ema  $ema
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ema $ema)
    {
        $this->validate($request, [
            'desde' => 'required',
            'hasta' => 'required',
            'periodo' => 'required',
            'pdf' => 'required|mimes:pdf'
        ]);
        $this->authorize('update', $ema);
        File::delete('area_legal/ema/'.$ema->pdf);
        $ema->update($request->except('pdf'));
        if ($request->hasFile('pdf'))
        {
            $file = $request->file('pdf');
            $path = public_path() . '/area_legal/ema';
            $fileName = uniqid() .'-'. $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            if ($moved)
                {
                    $ema->pdf = $fileName;
                    $ema->save();
                }
        }

        return redirect()->route('admin.emas.index', compact('ema'))->with('info', 'Datos Actualizados Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ema  $ema
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ema $ema)
    {
        $this->authorize('delete', $ema);
        $ema->delete();
        File::delete('area_legal/ema/'.$ema->pdf);
        return back()->with('info', 'La publicacion a sido Eliminada');
    }
}
