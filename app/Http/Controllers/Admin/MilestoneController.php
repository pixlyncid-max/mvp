<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    public function index()
    {
        $milestones = Milestone::orderBy('sort_order')->get();
        return view('admin.milestones.index', compact('milestones'));
    }

    public function create()
    {
        return view('admin.milestones.form', ['milestone' => new Milestone(), 'mode' => 'create']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'year'        => 'required|string|max:10',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order'  => 'integer',
        ]);
        Milestone::create($data);
        return redirect()->route('admin.milestones.index')->with('success', 'Milestone berhasil ditambahkan.');
    }

    public function edit(Milestone $milestone)
    {
        return view('admin.milestones.form', compact('milestone') + ['mode' => 'edit']);
    }

    public function update(Request $request, Milestone $milestone)
    {
        $data = $request->validate([
            'year'        => 'required|string|max:10',
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'sort_order'  => 'integer',
        ]);
        $milestone->update($data);
        return redirect()->route('admin.milestones.index')->with('success', 'Milestone berhasil diperbarui.');
    }

    public function destroy(Milestone $milestone)
    {
        $milestone->delete();
        return redirect()->route('admin.milestones.index')->with('success', 'Milestone berhasil dihapus.');
    }
}
