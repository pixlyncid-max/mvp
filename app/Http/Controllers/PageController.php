<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\PageContent;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\TeamMember;
use App\Models\Testimonial;

class PageController extends Controller
{
    private function settings(): array
    {
        return SiteSetting::allFlat();
    }

    public function home()
    {
        $settings     = $this->settings();
        $services     = Service::active()->get();
        $team         = TeamMember::active()->limit(3)->get();
        $testimonials = Testimonial::active()->get();
        $content      = PageContent::forPage('home');

        return view('welcome', compact('settings', 'services', 'team', 'testimonials', 'content'));
    }

    public function layanan()
    {
        $settings = $this->settings();
        $services = Service::active()->get();
        $content  = PageContent::forPage('layanan');

        return view('layanan', compact('settings', 'services', 'content'));
    }

    public function tentang()
    {
        $settings   = $this->settings();
        $milestones = Milestone::ordered()->get();
        $content    = PageContent::forPage('tentang');

        return view('tentang', compact('settings', 'milestones', 'content'));
    }

    public function tim()
    {
        $settings = $this->settings();
        $team     = TeamMember::active()->get();
        $content  = PageContent::forPage('tim');

        return view('tim', compact('settings', 'team', 'content'));
    }

    public function kontak()
    {
        $settings = $this->settings();
        $services = Service::active()->get();
        $content  = PageContent::forPage('kontak');

        return view('kontak', compact('settings', 'services', 'content'));
    }
}
