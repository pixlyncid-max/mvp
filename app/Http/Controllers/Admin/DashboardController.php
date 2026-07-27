<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Milestone;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services'     => Service::count(),
            'team'         => TeamMember::count(),
            'testimonials' => Testimonial::count(),
            'milestones'   => Milestone::count(),
        ];

        return view('admin.dashboard', compact('stats'));
    }
}
