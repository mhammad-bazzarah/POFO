<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\contact;
use App\Models\About;
use App\Models\Blog;
use App\Models\BlogSetting;
use App\Models\Category;
use App\Models\ContactSetting;
use App\Models\Experience;
use App\Models\Feedback;
use App\Models\FeedbackSettings;
use App\Models\FooterContactInfo;
use App\Models\FooterHelpLink;
use App\Models\FooterInfo;
use App\Models\FooterSocialLink;
use App\Models\FooterUsefulLink;
use App\Models\Hero;
use App\Models\HyperTitle;
use App\Models\PortfolioItem;
use App\Models\PortfolioSettings;
use App\Models\Service;
use App\Models\skillsItem;
use App\Models\SkillsSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hero = Hero::first();
        $hyperTitles = HyperTitle::all();
        $services = Service::all();
        $about = About::first();
        $exp = Experience::first();
        $feedbacks = Feedback::all();
        $feedbackSettings = FeedbackSettings::first();
        $portfolioSettings = PortfolioSettings::first();
        $portfolioItems = PortfolioItem::all();
        $categories = Category::all();
        $contactSettings = ContactSetting::first();
        $skillsItems = skillsItem::all();
        $skillsSettings = SkillsSetting::first();
        $blogSettings = BlogSetting::first();
        $blogItems = Blog::latest()->take(5)->get();

        return view('frontend.home', compact(
            'hero',
            'hyperTitles',
            'services',
            'about',
            'exp',
            'feedbacks',
            'feedbackSettings',
            'portfolioSettings',
            'portfolioItems',
            'categories',
            'contactSettings',
            'skillsSettings',
            'skillsItems',
            'blogSettings',
            'blogItems',

        ));
    }

    public function showPortfolio($id)
    {
        $pi = PortfolioItem::findOrFail($id);
        return view('frontend.portfolio-details', compact('pi'));
    }
    public function showBlog($id)
    {
        $bi = Blog::findOrFail($id);
        $previousPost = Blog::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $nextPost     = Blog::where('id', '>', $id)->orderBy('id', 'asc')->first();
        return view('frontend.blog-details', compact('bi', 'previousPost', 'nextPost'));
    }
    public function contact(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'subject' => ['required', 'max:300'],
            'email' => ['required', 'email'],
            'message' => ['required', 'max:2000'],
        ]);

        Mail::to(env('MAIL_FROM_ADDRESS'))->send(new contact($request->all()));

        return response(['status' => 'success', 'message' => 'Mail Sended Successfully!']);
    }
    public function blogs()
    {
        $blogs = Blog::latest()->paginate(9);
        return view('frontend.blog', compact('blogs'));
    }
}
