<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
    private array $pages = [
        'home'    => 'Beranda',
        'tentang' => 'Tentang',
    ];

    public function index()
    {
        $pages = $this->pages;
        return view('admin.pages.index', compact('pages'));
    }

    public function edit(string $page)
    {
        abort_unless(array_key_exists($page, $this->pages), 404);
        $contents = PageContent::where('page', $page)->orderBy('section')->orderBy('sort_order')->get()->groupBy('section');
        $pageLabel = $this->pages[$page];
        return view('admin.pages.edit', compact('contents', 'page', 'pageLabel'));
    }

    public function update(Request $request, string $page)
    {
        abort_unless(array_key_exists($page, $this->pages), 404);

        $data = $request->except(['_token', '_method']);

        foreach ($data as $id => $value) {
            PageContent::where('id', $id)->update(['value' => $value]);
        }

        return redirect()->route('admin.pages.edit', $page)
            ->with('success', 'Konten halaman berhasil disimpan.');
    }
}
