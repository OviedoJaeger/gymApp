<?php

namespace App\Http\Controllers\suscripciones;

use App\Http\Controllers\Controller;
use App\Models\Lockers;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class LockersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $lockers = lockers::latest()->get();
        return view('suscripciones.lockers', ['lockers' => $lockers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'cliente' => 'required',
            'numero' =>'required'
        ]);

        Lockers::create($request->all());
        return redirect()->route('lockers.index')->with('success', 'Locker asignado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $locker = lockers::where('id', $id)->first();
        //dd($cliente);
        return response()->json($locker);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lockers $lockers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id):RedirectResponse
    {
        $request->validate([
            'cliente' => 'required',
            'created_at' => 'required',
            'numero' =>'required'
        ]);

        $locker = Lockers::where('id',$id);
        $locker->update($request->except('_token', '_method'));
        return \redirect()->route('lockers.index')->with('success', 'Locker editado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $locker = lockers::where('id', $id);
        $locker->delete();
        return redirect()->route('lockers.index')->with('success', 'Locker eliminado correctamente');
    }
}
