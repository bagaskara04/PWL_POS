<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Level;
use App\Models\LevelModel;

class LevelController extends Controller
{
    public function index()
    {
        $data = LevelModel::all(); // Menggunakan Model
        return view('level.index', compact('data'));
    }

    public function create()
    {
        return view('level.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'level_kode' => 'required|unique:m_level,level_kode|max:50',
            'level_nama' => 'required|max:100',
        ]);

        LevelModel::create([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('level.index')->with('success', 'Level berhasil ditambahkan');
    }

    public function edit($id)
    {
        $level = LevelModel::findOrFail($id);
        return view('level.form', compact('level'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'level_kode' => 'required|max:50|unique:m_level,level_kode,' . $id . ',level_id',
            'level_nama' => 'required|max:100',
        ]);

        $level = LevelModel::findOrFail($id);
        $level->update([
            'level_kode' => $request->level_kode,
            'level_nama' => $request->level_nama,
            'updated_at' => now(),
        ]);

        return redirect()->route('level.index')->with('success', 'Level berhasil diperbarui');
    }

    public function destroy($id)
    {
        $level = LevelModel::findOrFail($id);
        $level->delete();
        return redirect()->route('level.index')->with('success', 'Level berhasil dihapus');
    }
}
