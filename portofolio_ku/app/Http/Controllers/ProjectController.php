<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;




class ProjectController extends Controller
{
    // Menampilkan daftar proyek
    public function index()
    {
        $projects = Project::all(); // Ambil semua proyek dari database
        return view('projects.index', compact('projects'));
    }

    // Menampilkan form tambah proyek
    public function create()
    {
        return view('projects.create');
    }

    // Menyimpan proyek ke database
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
    ]);

    // Simpan gambar jika ada
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public'); 
    }

    Project::create([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $imagePath, // Simpan path gambar ke database
    ]);

    return redirect()->route('projects.index')->with('success', 'Proyek berhasil ditambahkan!');
}


    // Menampilkan detail proyek
    public function showProyek()
    {
        $projects = Project::all(); // Mengambil semua proyek dari database
        return view('proyek', compact('projects'));
    }


    // Menampilkan form edit proyek
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    // Mengupdate proyek di database
    public function update(Request $request, Project $project)
{
    $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
    ]);

    // Hapus gambar lama jika ada gambar baru
    if ($request->hasFile('image')) {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
        $imagePath = $request->file('image')->store('images', 'public');
    } else {
        $imagePath = $project->image;
    }

    // Update proyek
    $project->update([
        'title' => $request->title,
        'description' => $request->description,
        'image' => $imagePath,
    ]);

    return redirect()->route('projects.index')->with('success', 'Proyek berhasil diperbarui!');
}


    // Menghapus proyek
    public function destroy(Project $project)
    {
        // Hapus gambar dari storage jika ada
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }
    
        // Hapus proyek dari database
        $project->delete();
    
        return redirect()->route('projects.index')->with('success', 'Proyek dan gambarnya berhasil dihapus!');
    }
}



