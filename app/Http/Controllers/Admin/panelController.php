<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Feedback;
use App\Models\PortfolioItem;
use App\Models\skillsItem;
use Illuminate\Http\Request;

class panelController extends Controller
{
    public function index()
    {
        $blogCount = Blog::count();
        $skillCount = skillsItem::count();
        $portfolioCount = PortfolioItem::count();
        $feedbackCount = Feedback::count();
        return view('admin.dashboard', compact(
            'blogCount',
            'skillCount',
            'portfolioCount',
            'feedbackCount'
        ));
    }
}
