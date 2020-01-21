<?php

namespace App\Http\Controllers\Admin;

use App\Closter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClosterController extends Controller
{

	public function index()
	{
		$closters = Closter::all();
        $clostersDelete = Closter::onlyTrashed()->get();
		return view('admin.closters.index', compact('closters', 'clostersDelete'));
	}

    public function edit(Closter $closter)
    {
        $this->authorize('update', $closter);
        return view('admin.closters.edit', [
            'closter' => $closter,
        ]);
    }

    public function update(Request $request, Closter $closter)
    {
        $this->validate($request, ['name' => 'required|min:1']);
        $closter->update( $request->all() );
        return redirect()->route('admin.closters.index', compact('closter'))->with('info', 'Closter Actualizado Correctamente');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'name' => 'required|min:3|unique:closters,name,NULL,id,deleted_at,NULL',
            ]);
    	$this->authorize('create', new Closter);
    	$closter = Closter::create($request->all());
    	return redirect()->route('admin.closters.index', compact('closter'))->with('info', 'Closter Actualizado')->withFragment('#');
    }

    public function destroy(Closter $closter)
    {
        $this->authorize('delete',$closter);
        $closter->delete();
        return back()->with('info', 'Closter Borrado inhabilitado exitosamente');
    }

    public function restore($id)
    {
        Closter::onlyTrashed()->find($id)->restore();
        return back()->with('info', 'Closter ahora visible');
    }

    public function forceDelete($id)
    {
        $closter = Closter::onlyTrashed()->find($id);
        $closter->forceDelete();
        return back()->with('info', 'Closter Borrado Permanentemente');
    }
}
