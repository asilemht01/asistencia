<?php

namespace App\Http\Controllers;

use App\Models\Practicante;
use App\Models\Oficina;
use Illuminate\Http\Request;
use App\Models\Asistencia;

/**
 * Class PracticanteController
 * @package App\Http\Controllers
 */
class PracticanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $practicantes = Practicante::paginate();

        return view('practicante.index', compact('practicantes'))
            ->with('i', (request()->input('page', 1) - 1) * $practicantes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $practicante = new Practicante();
        $oficinas = Oficina::pluck('nombreoficina','id');
        return view('practicante.create', compact('practicante','oficinas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Practicante::$rules);
        $practicante = Practicante::create($request->all());

        return redirect()->route('practicantes.index')
            ->with('success', 'Practicante created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $practicante = Practicante::find($id);

        return view('practicante.show', compact('practicante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $practicante = Practicante::find($id);
        $oficinas = Oficina::pluck('nombreoficina','id');
        return view('practicante.edit', compact('practicante','oficinas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Practicante $practicante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Practicante $practicante)
    {
        //  $practicante = Practicante::find($request->id);
        // dd($practicante);

        request()->validate([
            'dni' => 'required|unique:practicantes,dni,'.$practicante->dni.',dni',
            'nombre' => 'required',
            'Apellidos' => 'required',
            'telefono' => 'required|unique:practicantes,telefono,'.$practicante->telefono.',telefono',
            'procedencia' => 'required',
            'carrera' => 'required',
            'oficina_id' => 'required',
            'fecha_inicio' => 'required',
        ]);

        $practicante->update($request->all());

        return redirect()->route('practicantes.index')
            ->with('success', 'Practicante se a creado con  éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $apracticante= Practicante::find($id);
        if(asistencia::where('practicante_id',$id)->exists()){
            return redirect()->route('practicantes.index')
            ->with('danger', 'Practicante nose puede eliminar');
        }
        $practicante->delete();
        

        return redirect()->route('practicantes.index')
            ->with('success', 'Practicante se eliminado con éxito');
    }
}
