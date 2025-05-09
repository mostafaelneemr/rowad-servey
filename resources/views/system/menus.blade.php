@php
    $menu['Dashboard'] = [
        'permission' => ['system.dashboard'],
        'url' => route('system.dashboard'),
        'icon' => '<i class="fa fa-tachometer-alt"></i>',
        'text' => __('Dashboard'),
    ];

    $menu['Users'] = [
        'permission' => ['system.user.index','system.user.show','system.user.create','system.user.edit',
            'system.permission-group.index','system.permission-group.edit','system.permission-group.create',
        ],
        'icon' => '<i class="fa fa-users"></i>',
        'text' => __('Users'),
        'sub' => [
            [
                'permission' => ['system.user.index', 'system.user.show', 'system.user.create','system.user.edit'],
                'url' => route('system.user.index'),
                'text' => __('View'),
                'icon' => '<i class="fa fa-eye"></i>',
            ],
            [
                'permission' => ['system.permission-group.index','system.permission-group.edit','system.permission-group.create',],
                'url' => route('system.permission-group.index'),
                'text' => __('Permission Group'),
                'icon' => '<i class="fa fa-lock"></i>',
            ],

        ],
    ];

    $menu['Home'] = [
        'permission' => ['system.slider.index','system.slider.create','system.slider.edit',
                        'system.our-service.index','system.our-service.create','system.our-service.edit',
                        'system.testimonial.index','system.testimonial.create','system.testimonial.edit',
                        'system.statistic.index','system.statistic.create','system.statistic.edit'],
        'icon' => '<i class="fa-solid fa-house"></i>',
        'text' => __('Home'),
        'sub' => [
            [
                'permission' => ['system.slider.index','system.slider.create','system.slider.edit'],
                'url' => route('system.slider.index'),
                'text' => __('Sliders'),
                'icon' => ' <i class="fa-solid fa-sliders"></i>',
            ],

            [
                'permission' => ['system.statistic.index','system.statistic.create','system.statistic.edit'],
                'url' => route('system.statistic.index'),
                'text' => __('Statistics'),
                'icon' => ' <i class="fa-solid fa-sliders"></i>',
            ],
        ],
    ];

    $menu['Our Products'] = [
        'permission' => ['system.category.index','system.category.create','system.category.edit',
                        'system.product.index','system.product.create','system.product.edit'],
        'icon' => '<i class="fa-brands fa-blogger-b"></i>',
        'text' => __('Our Products'),
        'sub' => [
            [
                'permission' => ['system.category.index','system.category.create','system.category.edit'],
                'url' => route('system.category.index'),
                'text' => __('Categories'),
                'icon' => '<i class="fa-solid fa-comment"></i>',
            ],

            [
                'permission' => ['system.product.index','system.product.create','system.product.edit'],
                'url' => route('system.product.index'),
                'text' => __('Products'),
                'icon' => '<i class="fa-solid fa-comment"></i>',
            ],

            [
                'permission' => ['system.feature.index','system.feature.create','system.feature.edit'],
                'url' => route('system.feature.index'),
                'text' => __('Features'),
                'icon' => '<i class="fa-solid fa-comment"></i>',
            ],


        ],
    ];

    $menu['About Us'] = [
        'permission' => ['system.about.index','system.about.create','system.about.edit',
                        'system.our-service.index','system.our-service.create','system.our-service.edit',
                         'system.testimonial.index','system.testimonial.create','system.testimonial.edit'],
        'icon' => '<i class="fa-brands fa-blogger-b"></i>',
        'text' => __('About Us'),
        'sub' => [
            [
                'permission' => ['system.about.index','system.about.create','system.about.edit'],
                'url' => route('system.about.index'),
                'text' => __('About Section'),
                'icon' => '<i class="fa-brands fa-blogger-b"></i>',
            ],
            [
                'permission' => ['system.our-service.index','system.our-service.create','system.our-service.edit'],
                'url' => route('system.our-service.index'),
                'text' => __('Service'),
                'icon' => '<i class="fa-solid fa-sitemap"></i>',
            ],
            [
                'permission' => ['system.testimonial.index','system.testimonial.create','system.testimonial.edit'],
                'url' => route('system.testimonial.index'),
                'text' => __('Testimonials'),
                'icon' => '<i class="fa-solid fa-comment"></i>',
            ],
        ],
    ];

//    $menu['Blog'] = [
//        'permission' => ['system.blog.index','system.blog.create','system.blog.edit'],
//        'icon' => '<i class="fa-brands fa-blogger-b"></i>',
//        'text' => __('Blogs'),
//        'sub' => [
//            [
//                'permission' => ['system.blog.index','system.blog.create','system.blog.edit'],
//                'url' => route('system.blog.index'),
//                'text' => __('Blogs'),
//                'icon' => '<i class="fa-brands fa-blogger-b"></i>',
//            ],
//        ],
//    ];

    $menu['Messages'] = [
        'permission' => ['system.message.index'],
        'icon' => '<i class="fa-solid fa-envelope"></i>',
        'text' => __('Messages'),
        'sub' => [
            [
                'permission'=> ['system.message.index'],
                'url'=> route('system.message.index'),
                'icon'=>'<i class="fa-solid fa-envelope"></i>',
                'text'=> __('Messages'),
            ],
        ],
    ];


    $menu['Setting'] = [

        'permission' => ['system.activity-log.index','system.activity-log.show','system.auth-sessions.index',
                        'system.language.index','system.activate.index'],
        'icon' => '<i class="fa fa-cog"></i>',
        'text' => __('Setting'),
        'sub' => [

            [
                'permission'=> ['system.setting.index'],
                'url'=> route('system.setting.index'),
                'icon'=>'<i class="fa-solid fa-screwdriver-wrench"></i>',
                'text'=> __('setting'),
            ],

//            [
//                'permission'=> ['system.activate.index'],
//                'url'=> route('system.activate.index'),
//                'icon'=>'<i class="fa-solid fa-screwdriver-wrench"></i>',
//                'text'=> __('activate sections'),
//            ],

//            [
//                'permission'=> ['system.language.index'],
//                'url'=> route('system.language.index'),
//                'icon'=>'<i class="fa-solid fa-language"></i>',
//                'text'=> __('Languages'),
//            ],

            [
                'permission' => ['system.activity-log.index', 'system.activity-log.show'],
                'url' => route('system.activity-log.index'),
                'text' => __('Activity Log'),
                'icon' => ' <i class="fa fa-solid fa-magnifying-glass"></i>',
            ],

            [
                'permission'=> ['system.auth-sessions.index'],
                'url'=> route('system.auth-sessions.index'),
                'icon'=>'<i class="fa fa-user-tie"></i>',
                'text'=> __('Auth Sessions'),
            ],

        ],
    ];
@endphp

@foreach ($menu as $onemenu)
    {!! generateMenu($onemenu) !!}
@endforeach
