<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use App\Http\Requests\StoreEskulRequest;
use App\Http\Requests\UpdateEskulRequest;
use Illuminate\Http\Request;
use Session;


class EskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $eskul = Eskul::where('nama_eskul', 'like', '%' . $search . '%')->get();
        return view('admin/eskul', compact('eskul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin/eskul-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEskulRequest $request)
    {
        $eskul = Eskul::create($request->all());
        return redirect()->route('eskul.index')
            ->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }

    public function delete($id)
    {
        $eskul = Eskul::find($id);
        $eskul->delete();

        return redirect()->route('eskul.index')->with('success', 'Ekstrakurikuler berhasil dihapus.');
    }

    public function edit($id)
    {
        $eskul = Eskul::find($id);
    
        return view('admin/eskul-edit', compact('eskul'));
    }
    public function update(UpdateEskulRequest $request, $id)
    {
        $eskul = Eskul::find($id);
    
        $data = $request->validate([
            'nama_eskul' => 'required|string',
        ]);
    
        $eskul->update($data);
    
        return redirect()->route('eskul.index')->with('success', 'Ekstrakurikuler berhasil diperbarui.');
    }
    }
