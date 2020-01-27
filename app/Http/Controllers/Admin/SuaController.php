<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sua;
use Illuminate\Http\Request;

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
        $this->authorize('create', new Sua);
        return view('admin.sua.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'num_mes' => 'required',
            'year' => 'required',
            'cedula_determinacion_cuotas' => 'required|mimes:pdf',
            'resumen_liquidacion' => 'required|mimes:pdf',
            'pago_sua' => 'required|mimes:pdf',
        ]);

        $this->authorize('create', new Sua);
        $sua = Sua::create($request->except(['cedula_determinacion_cuotas', 'resumen_liquidacion', 'pago_sua']));
        if ($request->hasFile('cedula_determinacion_cuotas'))
        {
            $file = $request->file('cedula_determinacion_cuotas');
            $path = public_path() . '/area_legal/sua';
            $fileName = uniqid() .'-'. $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            if ($moved)
                {
                    $sua->cedula_determinacion_cuotas = $fileName;
                    $sua->save();
                }
        }
        if ($request->hasFile('resumen_liquidacion'))
        {
            $file = $request->file('resumen_liquidacion');
            $path = public_path() . '/area_legal/sua';
            $fileName = uniqid() .'-'. $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            if ($moved)
                {
                    $sua->resumen_liquidacion = $fileName;
                    $sua->save();
                }
        }
        if ($request->hasFile('pago_sua'))
        {
            $file = $request->file('pago_sua');
            $path = public_path() . '/area_legal/sua';
            $fileName = uniqid() .'-'. $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            if ($moved)
                {
                    $sua->pago_sua = $fileName;
                    $sua->save();
                }
        }

        return redirect()->route('admin.suas.index', compact('sua'))->with('info', 'Agregado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sua  $sua
     * @return \Illuminate\Http\Response
     */
    public function show(Sua $sua)
    {
        $this->authorize('update', $sua);
        return view('admin.sua.edit', compact('sua'));
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
