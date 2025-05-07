<?php

namespace App\Modules\Web;

use App\Enums\DefaultStatus;
use App\Http\Controllers\Controller;
use App\Models\admin\{Active_section, Slider, Testimonial, Blog, Project};

use App\Models\{Category, Product, Statistic};

class WebController extends Controller{

    public function index()
    {
        $this->viewData['sliders'] = Slider::get();
        $this->viewData['testimonials'] = Testimonial::orderBy('id', 'DESC')->paginate('3');
        $this->viewData['statistics'] = Statistic::orderBy('order')->get();

        $this->viewData['categories'] = Category::where('status',DefaultStatus::Active->value)->paginate('3');
        $this->viewData['products'] = Product::where('status',DefaultStatus::Active->value)->paginate('6');

        return view('web.home', $this->viewData);
    }

    public function about()
    {
//        if (Active_section::where('name' , 'about_page')->first()->value == 0 ) {
//            abort(404);
//        }
//        $this->viewData['sliders'] = Slider::where('slider_type', 'home')->get();
//        $this->viewData['testimonials'] = Testimonial::get();
//        $this->viewData['teams'] = Team::get();
//        $this->viewData['clients'] = Client::get();

        return view('web.about');
    }


    public function about2()
    {
//        $this->viewData['sliders'] = Slider::where('slider_type', 'home')->get();

        $this->viewData['statistics'] = Statistic::orderBy('order')->get();
        $this->viewData['testimonials'] = Testimonial::get();

        return view('web.about');
    }


    public function blogs()
    {
        if (Active_section::where('name' , 'blog_page')->first()->value == 0 ) {
            abort(404);
        }
        $this->viewData['sliders'] = Slider::where('slider_type', 'home')->get();
        $this->viewData['blogs'] = Blog::all();

        return $this->view('blogs', $this->viewData);
    }

    public function productSlug($slug)
    {
        $this->viewData['product'] = Product::where('slug', $slug)->first();
        // return $this->viewData['blogs'];
        return view('web.product_slug', $this->viewData);
    }

    public function project()
    {
        if (Active_section::where('name' , 'project_page')->first()->value == 0 ) {
            abort(404);
        }
        $this->viewData['categories'] = Project::distinct('category')->pluck('category');
        $this->viewData['items'] = Project::all();

        return $this->view('projects', $this->viewData);
    }

    public function categorySlug($slug)
    {
        $this->viewData['category'] = Category::where('slug', $slug)->first();
        return view('web.category_slug', $this->viewData);
    }

    public function contact()
    {
        return view('web.contact');
    }

}
