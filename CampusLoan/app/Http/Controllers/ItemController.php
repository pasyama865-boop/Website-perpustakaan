<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
public function index()
{
    $items = Item::all();
    return view('items.index', compact('items'));
}
public function create()
{
    return view('items.create');
}
public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'code' => 'required|unique:items,code',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
    ]);
    Item::create(($request->all()));
    return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan.');
}
public function edit(Item $item)
{
    return view('items.edit', compact('item'));
}
public function update(Request $request, Item $item)
{
    $request->validate([
        'name' => 'required',
        'code' => 'required',
        'stock' => 'required|integer',
    ]);
    $item->update($request->all());
    return redirect()->route('items.index')->with('success', 'Barang berhasil diupdate.');
}
public function destroy(Item $item)
{
    $item->delete();
    return redirect()->route('items.index')->with('success', 'Barang berhasil dihapus.');
}
}
