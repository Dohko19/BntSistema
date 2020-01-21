<?php

namespace App\Http\Controllers\Admin;

use App\Closter;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecibosNominaRequest;
use App\Http\Requests\StoreClientRequest;
use App\Marca;
use App\RecibosNomina;
use Illuminate\Http\Request;

class RecibosNominaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recibosnomina = RecibosNomina::allowed()->get();
        return view('admin.recibos_nomina.index', compact('recibosnomina'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['nombre' => 'required|min:1']);
        $this->authorize('create', new RecibosNomina);
        $recibosnomina = RecibosNomina::create($request->all());
        return redirect()->route('admin.recibosnomina.edit', $recibosnomina);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $recibosnomina
     * @return \Illuminate\Http\Response
     */
    public function show(RecibosNomina $recibosnomina)
    {
        return view('admin.recibos_nomina.show', compact('recibosnomina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $recibosnomina
     * @return \Illuminate\Http\Response
     */
    public function edit(RecibosNomina $recibosnomina)
    {
        $this->authorize('update', $recibosnomina);
        return view('admin.recibos_nomina.edit', [
            'recibosnomina' => $recibosnomina,
            'marcas' => Marca::all(),
            'closters' => Closter::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\recibosnomina  $recibosnomina
     * @return \Illuminate\Http\Response
     */
    public function update(RecibosNominaRequest $request, RecibosNomina $recibosnomina)
    {
        $this->authorize('update', $recibosnomina);
        File::delete('area_legal/ema/'.$recibosnomina->recibo_nomina);
        $recibosnomina->update($request->except('recibo_nomina'));
        if ($request->hasFile('recibo_nomina'))
        {
            $file = $request->file('recibo_nomina');
            $path = public_path() . '/recibos/nomina';
            $fileName = uniqid() .'-'. $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            if ($moved)
                {
                    $recibosnomina->recibo_nomina = $fileName;
                    $recibosnomina->save();
                }
        }

    return redirect()->route('admin.recibosnomina.index', compact('recibosnomina'))->with('info', 'Datos Recibos de Nomina Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecibosNomina $recibosnomina)
    {
        $this->authorize('delete', $recibosnomina);
        File::delete('area_legal/ema/'.$recibosnomina->recibo_nomina);
        $recibosnomina->delete();
        return back()->with('info', 'La publicacion a sido Eliminada');
    }
}
