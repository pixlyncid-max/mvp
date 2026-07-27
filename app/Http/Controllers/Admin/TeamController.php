<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $members = TeamMember::orderBy('sort_order', 'asc')->get();
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.form', ['member' => new TeamMember(), 'mode' => 'create']);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'role'       => 'required|string|max:255',
            'specialty'  => 'required|string|max:255',
            'expertise'  => 'nullable|array',
            'expertise.*'=> 'string',
            'photo'      => 'nullable|image|max:5120',
            'photo_url'  => 'nullable|string',
            'sort_order' => 'integer',
            'is_active'  => 'boolean',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/team'), $filename);
            $data['photo_url'] = asset('images/team/' . $filename);
        }

        $data['expertise'] = array_filter($data['expertise'] ?? []);
        $data['is_active'] = $request->boolean('is_active', true);

        // Remove photo from data as it's not a database field
        unset($data['photo']);

        TeamMember::create($data);

        return redirect()->route('admin.team.index')
            ->with('success', 'Anggota tim berhasil ditambahkan.');
    }

    public function edit(TeamMember $team)
    {
        return view('admin.team.form', ['member' => $team, 'mode' => 'edit']);
    }

    public function update(Request $request, TeamMember $team)
    {
        $data = $request->validate([
            'name'       => 'required|string|max:255',
            'role'       => 'required|string|max:255',
            'specialty'  => 'required|string|max:255',
            'expertise'  => 'nullable|array',
            'expertise.*'=> 'string',
            'photo'      => 'nullable|image|max:5120',
            'photo_url'  => 'nullable|string',
            'sort_order' => 'integer',
            'is_active'  => 'boolean',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old local file if exists
            if ($team->photo_url && str_contains($team->photo_url, '/images/team/')) {
                $oldPath = public_path(str_replace(asset(''), '', $team->photo_url));
                if (file_exists($oldPath)) {
                    @unlink($oldPath);
                }
            }

            $file = $request->file('photo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/team'), $filename);
            $data['photo_url'] = asset('images/team/' . $filename);
        }

        $data['expertise'] = array_filter($data['expertise'] ?? []);
        $data['is_active'] = $request->boolean('is_active');

        // Remove photo from data as it's not a database field
        unset($data['photo']);

        $team->update($data);

        return redirect()->route('admin.team.index')
            ->with('success', 'Data anggota tim berhasil diperbarui.');
    }

    public function destroy(TeamMember $team)
    {
        $team->delete();
        return redirect()->route('admin.team.index')
            ->with('success', 'Anggota tim berhasil dihapus.');
    }
}
