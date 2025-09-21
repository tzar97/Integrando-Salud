<?php

namespace App\Http\Controllers;

use App\Models\Tratamiento;
use App\Models\Paciente;
use App\Models\TipoPet;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TratamientoController extends Controller
{
    
    public function index(Paciente $paciente)
    {
        $tratamientos = Tratamiento::with('tipoPet')
            ->where('paciente_id', $paciente->id)
            ->orderBy('fecha_inicio', 'desc')
            ->get();

        return Inertia::render('Tratamiento/tratamientos', [
            'paciente' => $paciente,
            'tratamientos' => $tratamientos,
        ]);
    }




    public function create(Paciente $paciente)
    {
        $tipos = TipoPet::where('estado', true)->orderBy('nombre')->get();

        return Inertia::render('Tratamiento/form', [
            'pacienteId' => $paciente->id,
            'tipos' => $tipos,
        ]);
    }



    public function store(Request $request, Paciente $paciente)
    {
        $data = $request->validate([
            'tipo_pet_id' => 'required|exists:tipo_pets,id',
            'fecha_inicio' => 'required|date|before_or_equal:today',
        ]);

        $data['paciente_id'] = $paciente->id;

        Tratamiento::create($data);

        return redirect()->route('tratamientos.index', $paciente->id)->with('Exito', 'Tratamiento agregado correctamente');
    }



    public function destroy($pacienteId, Tratamiento $tratamiento)
    {
        $tratamiento->delete();
        
        return redirect()
            ->route('tratamientos.index', $pacienteId)
            ->with('success', 'Tratamiento eliminado correctamente.');
    }

}
