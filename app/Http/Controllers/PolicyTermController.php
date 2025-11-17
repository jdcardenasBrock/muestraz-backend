<?php

namespace App\Http\Controllers;

use App\Models\Policy;
use Illuminate\Http\Request;

class PolicyTermController extends Controller
{
    public function index()
    {
        $policia = Policy::orderBy('id', 'desc')->first();
        return view('m_policyterm', compact('policia'));
    }

    public function publicView()
{
    // Siempre toma la última versión creada
    $policia_u = Policy::latest()->first();

    return view('policyterm_u', compact('policia_u'));
}


    public function store(Request $request)
    {
        // Validación profesional
        $request->validate([
            'term'   => 'required|min:10',
            'policy' => 'required|min:10',
        ], [
            'term.required'   => 'El campo Términos es obligatorio.',
            'term.min'        => 'Los Términos deben contener al menos 10 caracteres.',
            'policy.required' => 'El campo Políticas es obligatorio.',
            'policy.min'      => 'Las Políticas deben contener al menos 10 caracteres.',
        ]);

        // Elimina registros anteriores (solo debe haber uno)
        Policy::truncate();

        // Crea NUEVO registro
        Policy::create([
            'policy' => $request->policy,
            'term'   => $request->term,
        ]);

        return redirect()
            ->route('policy.index')
            ->with('success', '¡La información fue creada correctamente!');
    }

    public function update(Request $request)
    {
        // Validación profesional
        $request->validate([
            'term'   => 'required|min:10',
            'policy' => 'required|min:10',
        ], [
            'term.required'   => 'El campo Términos es obligatorio.',
            'term.min'        => 'Los Términos deben contener al menos 10 caracteres.',
            'policy.required' => 'El campo Políticas es obligatorio.',
            'policy.min'      => 'Las Políticas deben contener al menos 10 caracteres.',
        ]);

        // Obtén o crea el único registro
        $policia = Policy::first() ?? new Policy();

        // Actualiza
        $policia->policy = $request->policy;
        $policia->term   = $request->term;
        $policia->save();

        return redirect()
            ->route('policy.index')
            ->with('success', '¡La información fue actualizada correctamente!');
    }
}
