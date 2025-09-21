<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Models\Paciente;

use Inertia\Inertia;


class PacienteController extends Controller
{

 
    public function index(Request $request)
    {
        $query = Paciente::query()
            ->when($request->apellido, function ($q) use ($request) {
                $q->where('apellido', 'like', '%' . $request->apellido . '%');
            })
            ->when($request->dni, function ($q) use ($request) {
                $q->where('dni', 'like', '%' . $request->dni . '%');
            })
            ->orderBy('apellido')
            ->orderBy('nombre');

        $pacientes = $query->paginate(10)->appends($request->query());

        return Inertia::render('Pacientes/Listado', ['pacientes' => $pacientes]);
        return Inertia::render('Pacientes/Listado', [

        'pacientes' => $pacientes,
        'filtro'   => $request->only(['apellido','dni']), 
    ]);
    }


    public function create()
    {
        return Inertia::render('Pacientes/Nuevo');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'sexo' => 'required|in:M,F,X',
            'dni' => 'required|string|max:20|unique:pacientes,dni',
            'fecha_nacimiento' => 'required|date|before:today',
        ]);

        Paciente::create($data);

        return redirect()->route('pacientes.nuevo')->with('Exito', 'Paciente creado correctamente.');
    }


  
    public function edit(Paciente $paciente)
    {
        return Inertia::render('Pacientes/Modificar', ['paciente' => $paciente]);
    }


    public function update(Request $request, Paciente $paciente)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'sexo' => 'required|in:M,F,X',
            'dni' => 'required|string|max:20|unique:pacientes,dni,' . $paciente->id,
            'fecha_nacimiento' => 'required|date|before:today',
        ]);

        $paciente->update($data);

        return redirect()->route('pacientes.listado')->with('Exito', 'Paciente actualizado');
    }
}
