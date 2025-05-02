<?php

namespace App\Modules\Web;

use App\Enums\DefaultStatus;
use App\Http\Controllers\Controller;
use App\Models\admin\{Active_section, Slider, Testimonial, Blog, Career, Client, Project, Team};

use App\Models\{Category, OurActive, Product, Statistic};

class WebController extends Controller{

    public function index()
    {
        $this->viewData['sliders'] = Slider::get();
        $this->viewData['testimonials'] = Testimonial::orderBy('id', 'ASC')->get();
        $this->viewData['statistics'] = Statistic::orderBy('order')->get();


        $this->viewData['categories'] = Category::where('status',DefaultStatus::Active->value)->paginate('3');
        $this->viewData['products'] = Product::paginate('6');

        return view('web.home', $this->viewData);
    }

    public function about()
    {
        if (Active_section::where('name' , 'about_page')->first()->value == 0 ) {
            abort(404);
        }
        $this->viewData['sliders'] = Slider::where('slider_type', 'home')->get();
        $this->viewData['testimonials'] = Testimonial::get();
        $this->viewData['teams'] = Team::get();
        $this->viewData['clients'] = Client::get();

        return $this->view('about', $this->viewData);
    }

    public function service()
    {
        if (Active_section::where('name' , 'service_page')->first()->value == 0 ) {
            abort(404);
        }
        $this->viewData['items'] = Project::orderBy('id', 'ASC')->get();
        $this->viewData['activities'] = OurActive::with('fontawsome')->orderBy('id', 'ASC')->get();

        return $this->view('service',$this->viewData);
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

    public function blogSlug($slug)
    {
        $this->viewData['sliders'] = Slider::where('slider_type', 'home')->get();
        $this->viewData['blog'] = Blog::where('slug', $slug)->first();
        // return $this->viewData['blogs'];
        return $this->view('blog_slug', $this->viewData);
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

    public function career()
    {
        if (Active_section::where('name' , 'career_page')->first()->value == 0 ) {
            abort(404);
        }
        $this->viewData['careers'] = Career::get();
        return $this->view('career', $this->viewData);
    }

    public function categorySlug($slug)
    {
        $this->viewData['category'] = Category::where('slug', $slug)->first();
        return $this->view('category_slug', $this->viewData);
    }

    public function contact()
    {
//        $this->viewData['sliders'] = Slider::where('slider_type', 'home')->get();
        return view('web.contact');
    }

}
