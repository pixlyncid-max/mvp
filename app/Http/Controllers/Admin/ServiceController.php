<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.form', ['service' => new Service(), 'mode' => 'create']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icon'        => 'required|string',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'items'       => 'nullable|array',
            'items.*'     => 'string',
            'sort_order'  => 'integer',
            'is_active'   => 'boolean',
        ]);

        $data['items']     = array_filter($data['items'] ?? []);
        $data['is_active'] = $request->boolean('is_active', true);

        Service::create($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        return view('admin.services.form', compact('service') + ['mode' => 'edit']);
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'icon'        => 'required|string',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'items'       => 'nullable|array',
            'items.*'     => 'string',
            'sort_order'  => 'integer',
            'is_active'   => 'boolean',
        ]);

        $data['items']     = array_filter($data['items'] ?? []);
        $data['is_active'] = $request->boolean('is_active');

        $service->update($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }

    public function toggleActive(Service $service)
    {
        $service->update(['is_active' => ! $service->is_active]);
        return back()->with('success', 'Status layanan diperbarui.');
    }
}
