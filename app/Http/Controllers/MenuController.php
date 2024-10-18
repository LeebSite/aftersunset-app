<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all(); // Ambil semua data menu
        return view('menu', compact('menus'));
    }

    public function create()
    {
        return view('menu_create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Simpan file gambar
        $gambarPath = $request->file('gambar')->store('public/menu-images');
        $gambarUrl = str_replace('public/', 'storage/', $gambarPath);
    
        // Simpan data menu ke database
        Menu::create([
            'nama' => $validatedData['nama'],
            'harga' => $validatedData['harga'],
            'gambar' => $gambarUrl,
        ]);
    
        return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan!');
    }
    

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu_edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|url',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($validated);
        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }
}
