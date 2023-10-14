<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Psicologia;


class ListadoPsicologiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $psicologias = Psicologia::query();
        if (!empty($_GET['s'])) {
            $psicologias = $psicologias->where('id', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('tipo_documento', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('numero_documento', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('nombres', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('apellidos', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('telefono', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('especialidad', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('genero', 'LIKE', '%'.$_GET['s'].'%')
                                ->orWhere('fecha_hora', 'LIKE', '%'.$_GET['s'].'%');
            }
            $psicologias = $psicologias->get();
        return view('lstpsicologia.index', compact('psicologias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view ('lstpsicologia.create');

    }
    public function formulario()
    {
        return view ('lstpsicologia.formulario');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $psicologia = new Psicologia;
            $psicologia->tipo_documento = $request->tipo_documento;
            $psicologia->numero_documento = $request->numero_documento;
            $psicologia->nombres = $request->nombres;
            $psicologia->apellidos = $request->apellidos;
            $psicologia->telefono = $request->telefono;
            $psicologia->especialidad = $request->especialidad;
            $psicologia->genero = $request->genero;
            $psicologia->fecha_hora = now(); 
            $psicologia->estado = $request->estado; 
            
            $psicologia->save();
            return view ('lstpsicologia.index');
        }

    // Importa el modelo correspondiente si no lo has hecho ya
 // Asegúrate de reemplazar 'TuModelo' con el nombre de tu modelo

public function actualizarEstado(Request $request) {
    // Obtén el valor del estado desde la solicitud POST
    $estado = $request->input('estado');

    // Realiza la actualización del campo "estado" en tu modelo o base de datos
    // Por ejemplo, asumiendo que tienes un modelo llamado 'Psicologia':
    $psicologia = Psicologia::find($request->id);
    $psicologia->estado = $estado;
    $psicologia->save();

    // Puedes devolver una respuesta JSON si es necesario
    return response()->json(['message' => 'Estado actualizado correctamente']);
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
        $psicologia = Psicologia::findOrFail($id);
        return view ('lstpsicologia.edit', compact('psicologia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $psicologia = Psicologia::FindOrFail($id);
    $psicologia->tipo_documento = $request->tipo_documento;
    $psicologia->numero_documento = $request->numero_documento;
    $psicologia->nombres = $request->nombres;
    $psicologia->apellidos = $request->apellidos;
    $psicologia->telefono = $request->telefono;
    $psicologia->especialidad = $request->especialidad;
    $psicologia->genero = $request->genero;
    $psicologia->fecha_hora = now(); 
    $psicologia->estado = $request->estado;

    $psicologia->save();
    return redirect()->route('lstpsicologia.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $psicologia = Psicologia::findOrFail($id);
        $psicologia-> delete();
        return redirect()->route('lstpsicologia.index');
    }
}
