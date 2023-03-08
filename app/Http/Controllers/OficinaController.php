<?php

namespace App\Http\Controllers;

use App\Models\Oficina;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Models\Practicante;

/**
 * Class OficinaController
 * @package App\Http\Controllers
 */
class OficinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oficinas = Oficina::paginate();

        return view('oficina.index', compact('oficinas'))
            ->with('i', (request()->input('page', 1) - 1) * $oficinas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $oficina = new Oficina();
        $areas= Area::pluck('nombrearea','id');
        return view('oficina.create', compact('oficina','areas')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Oficina::$rules);

        $oficina = Oficina::create($request->all());

        return redirect()->route('oficinas.index')
            ->with('success', 'Oficina se creo con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oficina = Oficina::find($id);

        return view('oficina.show', compact('oficina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oficina = Oficina::find($id);
        $areas= Area::pluck('nombrearea','id');
        return view('oficina.edit', compact('oficina','areas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Oficina $oficina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Oficina $oficina)
    {
        request()->validate(Oficina::$rules);

        $oficina->update($request->all());

        return redirect()->route('oficinas.index')
            ->with('success', 'Oficina se actualizo con éxito.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $oficina= Oficina::find($id);
        if(Practicante::where('oficina_id',$id)->exists()){
            return redirect()->route('oficinas.index')
            ->with('danger', 'No se puede eliminar oficina');
        }
        $oficina->delete();

        return redirect()->route('oficinas.index')
            ->with('success', 'Oficina se elimino con éxito.');
    }
}
