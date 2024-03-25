<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogSettingsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactSettingsController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\panelController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SeoSettingsController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\HyperTitleController;
use App\Http\Controllers\Admin\feedbackSettingsController;
use App\Http\Controllers\Admin\PortfolioItemController;
use App\Http\Controllers\Admin\PortfolioSettingsController;
use App\Http\Controllers\Admin\skillsItemsController;
use App\Http\Controllers\Admin\SkillsSettingsController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FooterContactInfoController;
use App\Http\Controllers\Admin\FooterHelpLinksController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\FooterSocialLinkController;
use App\Http\Controllers\Admin\FooterUserfulLinksController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\settingController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/auth.php';
// frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/portfolio-details/{id}', [HomeController::class, 'showPortfolio'])->name('show.portfolio');
Route::get('/blog-details/{id}', [HomeController::class, 'showBlog'])->name('show.blog');
Route::get('allBlogs', [HomeController::class, 'blogs'])->name('allBlogs');
Route::post('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('about/downloadResume', [AboutController::class, 'resumeDownload'])->name('about.downloadResume');
// Admin routes

Route::get('/dashboard', [panelController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    // Hero section routes
    Route::resource('/hero', HeroController::class);
    Route::resource('/hyperTitle', HyperTitleController::class);
    // Services section routes
    Route::resource('/service', ServiceController::class);
    // About section routes
    Route::resource('/about', AboutController::class);
    // Portfolio section routes
    Route::resource('/portfolioCategory', CategoryController::class);
    Route::resource('/portfolioItem', PortfolioItemController::class);
    Route::resource('/portfolioSettings', PortfolioSettingsController::class);
    // Skills section routes
    Route::resource('/skillsSettings', SkillsSettingsController::class);
    Route::resource('/skillsItems', skillsItemsController::class);
    // Experience section routes
    Route::resource('/experience', ExperienceController::class);
    // Feedback section routes
    Route::resource('/feedback', FeedbackController::class);
    Route::resource('/feedbackSettings', feedbackSettingsController::class);
    // Blog section routes
    Route::resource('/blogCategory', BlogCategoryController::class);
    Route::resource('/blogs', BlogController::class);
    Route::resource('/blogSettings', BlogSettingsController::class);
    // Contact section routes
    Route::resource('/contactSettings', ContactSettingsController::class);
    // Footer section routes
    Route::resource('/footerSocial', FooterSocialLinkController::class);
    Route::resource('/footerInfo', FooterInfoController::class);
    Route::resource('/footerContactInfo', FooterContactInfoController::class);
    Route::resource('/footerUseful', FooterUserfulLinksController::class);
    Route::resource('/footerHelp', FooterHelpLinksController::class);
    // Settings section routes
    Route::get('/settings', settingController::class)->name('settings');
    Route::resource('/generalSettings', GeneralSettingsController::class);
    Route::resource('/seoSettings', SeoSettingsController::class);
});
