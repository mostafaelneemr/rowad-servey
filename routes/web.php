<?php

use App\Models\admin\Blog;
use App\Models\admin\Project;
use App\Modules\System\SendEmailController;
use App\Modules\Web\WebController;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\url;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', 'WebController@index')->name('web.web.index');


Route::get('/sitemap', function () {
    $sitemap = Sitemap::create()
        ->add(url::create('/'))
        ->add(url::create('/about'))
        ->add(url::create('/service'))
        ->add(url::create('/portfolio'))
        ->add(url::create('/contact'));
    Blog::all()->each(function (Blog $blog) use ($sitemap) {
        $sitemap->add(url::create("/blog/{$blog->slug}"));
    });

    Project::all()->each(function (Project $project) use ($sitemap) {
        $sitemap->add(url::create("/project/{$project->slug}"));
    });

    $sitemap->writeToFile(public_path('sitemap.xml'));
});

Route::get('/sitemap/{xml_site_map_file}', function ($xml_site_map_file) {
    if (file_exists(public_path('/sitemap/' . $xml_site_map_file))) {
        return response(file_get_contents(public_path('/sitemap/' . $xml_site_map_file)), 200, [
            'Content-Type' => 'application/xml'
        ]);
    } else {
        return redirect()->route('home');
    }
})->name('sitemap');

Route::get('/sitemap.xml', function () {
    return base_path('sitemap.xml');
});



Route::get('/', [WebController::class, 'index'])->name('home');
Route::get('/about', [WebController::class, 'about'])->name('about');
Route::get('/service', [WebController::class, 'service'])->name('service');
Route::get('/portfolio', [WebController::class, 'service'])->name('portfolio');

Route::get('/blogs', [WebController::class, 'blogs'])->name('blogs');
Route::get('/blog/{slug}', [WebController::class, 'blogSlug'])->name('blog.slug');

Route::get('/category/{slug}', [WebController::class, 'categorySlug'])->name('category.slug');
Route::get('/projects', [WebController::class, 'project'])->name('projects');

Route::get('/careers', [WebController::class, 'career'])->name('career');

Route::get('/contact', [WebController::class, 'contact'])->name('contact');

Route::post('send-email', [SendEmailController::class, 'index'])->name('sendmail');


Route::get('change-language/{lang}', function($lang){
    if (in_array($lang, ['en', 'ar'])) {
        session(['locale' => $lang]);
    }
    return redirect()->back();
});
