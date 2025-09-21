<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoPet;
use Inertia\Inertia;

class TipoPetController extends Controller
{

    public function index(Request $request)
    {
            $estado = $request->get('estado');

            logger()->info('Valor de estado:', [$estado]);

            $tipos = TipoPet::query()
                ->when($estado === 'alta', fn($q) => $q->where('estado', 1))
                ->when($estado === 'baja', fn($q) => $q->where('estado', 0))
                ->orderBy('nombre')
                ->paginate(10)
                ->appends($request->query());

            return Inertia::render('pet/listarpet', [
                'tipos' => $tipos,
                'estado' => $estado
            ]);
    }



    public function create()
    {
        return Inertia::render('pet/Form');
    }



    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:120',
            'color' => 'required|in:verde,amarillo,ambar,rojo',
            'intensidad' => 'required|integer|min:1|max:10',
            'duracion_min' => 'required|integer|min:1|max:1440',
            'requiere_ayuno' => 'required|boolean',
            'observaciones' => 'nullable|string',
        ]);

        TipoPet::create($data);

        return redirect()->route('pet.index')->with('Exito', 'Tipo de PET creado correctamente');
    }

    
    public function edit(TipoPet $tipo)
    {
        return Inertia::render('pet/Form', ['tipo' => $tipo]);
    }

  
    public function update(Request $request, TipoPet $tipo)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:120',
            'color' => 'required|in:verde,amarillo,ambar,rojo',
            'intensidad' => 'required|integer|min:1|max:10',
            'duracion_min' => 'required|integer|min:1|max:1440',
            'requiere_ayuno' => 'required|boolean',
            'observaciones' => 'nullable|string',
            'estado' => 'boolean',
        ]);

        $tipo->update($data);

        return redirect()->route('pet.index')->with('Exito', 'Tipo de PET actualizado');
    }



    
    //  cambiar estado (alta/baja)
    public function cambiarEstado(TipoPet $tipo)
    {
        $tipo->estado = !$tipo->estado;
        $tipo->save();

        return back()->with('Exito', 'Estado actualizado');
    }
}
