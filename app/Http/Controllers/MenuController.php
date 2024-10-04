<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;


use App\Models\Menu;
use Illuminate\Http\RedirectResponse;
class MenuController extends Controller
{
    public function index(): View
    {
        $menus = Menu::latest()->paginate(10);
        return view('menus.index', compact('menus'));
    }

    public function create(): View
    {
        return view('menus.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'gambar_menu'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama_menu'     => 'required|min:5',
            'detail_menu'   => 'required|min:5',
            'harga'   => 'required|numeric',
            'stok'   => 'required|numeric',
        ]);

        // Mengunggah dan menyimpan gambar
        if ($request->hasFile('gambar_menu')) {
        // Simpan gambar ke dalam storage 'public/menus' dengan nama yang di-hash secara otomatis
        $image = $request->file('gambar_menu');
        $image->store('menus', 'public');  // Simpan di folder 'menus' di dalam disk 'public'
        

        Menu::create([
            'gambar_menu'   => $image->hashName(),
            'nama_menu'     => $request->nama_menu,
            'detail_menu'   => $request->detail_menu,
            'harga'         => $request->harga,
            'stok'          => $request->stok,
        ]);

        return redirect()->route('menus.index')->with
        ('success', 'Data Berhasil Disimpan!.');
    }
}
}