<?php

use App\Models\admin\Blog;
use App\Models\admin\Project;
use App\Modules\Web\SendEmailController;
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


Route::controller(WebController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/about', 'about')->name('about');
    Route::get('/about2', function () {
        return view('web.about2');
    })->name('about2');
    Route::get('/service', 'service')->name('service');
    Route::get('/portfolio', 'service')->name('portfolio');

    Route::get('/blogs', 'blogs')->name('blogs');
    Route::get('/blog/{slug}', 'blogSlug')->name('blog.slug');

    Route::get('/projects', 'project')->name('projects');

    Route::get('/careers', 'career')->name('career');

    Route::get('/contact', 'contact')->name('contact');

    Route::get('/category/{slug}', 'categorySlug')->name('category.slug');
    Route::get('/product/{slug}', 'productSlug')->name('product.slug');

});
Route::post('send-email', [SendEmailController::class, 'store'])->name('sendmail');


Route::get('change-language/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'ar'])) {
        session(['locale' => $lang]);
    }
    return redirect()->back();
});
