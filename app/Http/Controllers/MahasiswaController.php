<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\MahasiswaStoreRequest;
use App\Http\Requests\MahasiswaUpdateRequest;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->paginate(5);
          
        return view('mahasiswa.index', compact('mahasiswa'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('mahasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MahasiswaStoreRequest $request): RedirectResponse
    {
        Mahasiswa::create($request->validated());
           
        return redirect()->route('mahasiswa.index')
                         ->with('success', ' Mahasiswa Berhasil Ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa): View
    {
        return view('mahasiswa.show',compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa): View
    {
        return view('mahasiswa.edit',compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MahasiswaUpdateRequest $request, Mahasiswa $mahasiswa): RedirectResponse
    {
        $mahasiswa->update($request->validated());
          
        return redirect()->route('mahasiswa.index')
                        ->with('success','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa): RedirectResponse
    {
        $mahasiswa->delete();
           
        return redirect()->route('mahasiswa.index')
                        ->with('success','Data Berhasil dihapus');
    }
}
