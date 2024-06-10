<?php

// StoreController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::all();
        return view('admin.stores.index', compact('stores'));
    }

    public function create()
    {
        // Ambil semua pengguna yang memiliki peran seller
        $sellers = User::whereHas('roles', function ($query) {
            $query->where('role_name', 'seller');
        })->get();

        return view('admin.stores.create', compact('sellers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'contact' => 'nullable|string',
            'seller_id' => 'required|exists:users,id',
        ]);

        $data = $request->all();
        $data['user_id'] = $request->seller_id;

        Store::create($data);

        return redirect()->route('admin.stores.index')->with('success', 'Store created successfully.');
    }

    public function edit(Store $store)
    {
        return view('admin.stores.edit', compact('store'));
    }

    public function update(Request $request, Store $store)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string',
            'contact' => 'nullable|string',
            // Add validation rules as needed
        ]);

        $store->update($request->all());

        return redirect()->route('admin.stores.index')->with('success', 'Store updated successfully.');
    }

    public function destroy(Store $store)
    {
        $store->delete();
        return redirect()->route('admin.stores.index')->with('success', 'Store deleted successfully.');
    }
}
