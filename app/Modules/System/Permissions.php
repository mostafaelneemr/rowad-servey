<?php

return [

    [
        'group_title' => __('Users'),
        'name' => __('Users'),
        'permissions' => [
            'view-all-user' => ['system.user.index', 'system.user.show', 'system.get-user-activity-log'],
            'create-user' => ['system.user.create', 'system.user.store'],
            'update-user' => ['system.user.edit', 'system.user.update']
        ]
    ],


    [
        'name' => __('Permission Group'),
        'permissions' => [
            'view-all-permission-groups' => ['system.permission-group.index'],
            'create-permission-group' => ['system.permission-group.create', 'system.permission-group.store'],
            'update-permission-group' => ['system.permission-group.edit', 'system.permission-group.update']
        ]
    ],

    [
        'group_title' => __('Home'),
        'name' => __('Slider'),
        'permissions' => [
            'view-slider' => ['system.slider.index'],
            'create-slider' => ['system.slider.create', 'system.slider.store'],
            'update-slider' => ['system.slider.edit', 'system.slider.update']
        ]
    ],

    [
        'group_title' => __('Home'),
        'name' => __('Statistic'),
        'permissions' => [
            'view-statistic' => ['system.statistic.index'],
            'create-statistic' => ['system.statistic.create', 'system.statistic.store'],
            'update-statistic' => ['system.statistic.edit', 'system.statistic.update']
        ]
    ],

    [
        'name' => __('Our Service'),
        'permissions' => [
            'view-all-services' => ['system.our-service.index'],
            'create-service' => ['system.our-service.create', 'system.our-service.store'],
            'update-service' => ['system.our-service.edit', 'system.our-service.update']
        ]
    ],

    [
        'name' => __('Category'),
        'permissions' => [
            'view-all-category' => ['system.category.index'],
            'create-category' => ['system.category.create', 'system.category.store'],
            'update-category' => ['system.category.edit', 'system.category.update']
        ]
    ],

    [
        'name' => __('Testimonials'),
        'permissions' => [
            'view-all-testimonials' => ['system.testimonial.index'],
            'create-testimonial' => ['system.testimonial.create', 'system.testimonial.store'],
            'update-testimonial' => ['system.testimonial.edit', 'system.testimonial.update']
        ]
    ],

    [
        'name' => __('Products'),
        'permissions' => [
            'view-all-products' => ['system.product.index'],
            'create-product' => ['system.product.create', 'system.product.store'],
            'update-product' => ['system.product.edit', 'system.product.update']
        ]
    ],

    [
        'name' => __('Blogs'),
        'permissions' => [
            'view-all-blogs' => ['system.blog.index'],
            'create-blogs' => ['system.blog.create', 'system.blog.store'],
            'update-blogs' => ['system.blog.edit', 'system.blog.update']
        ]
    ],

    [
        'group_title' => __('Setting'),
        'name' => __('Activity Log'),
        'permissions' => [
            'view-activity-log' => ['system.activity-log.index', 'system.activity-log.show'],
            'view-log-viewer' => ['log-viewer.index'],
            'git-version-control' => ['system.git-version-control'],
            'view-shipping-log' => ['system.shipping-log.index', 'system.shipping-log.show'],

        ]
    ],

    [
        'name' => __('Language'),
        'permissions' => [
            'view-language' => ['system.language.index'],
            'create-language' => ['system.language.create', 'system.language.store'],
            'update-language' => ['system.language.edit', 'system.language.update'],

        ]
    ],

    [
        'name' => __('Setting'),
        'permissions' => [
            'view-setting' => ['system.setting.index', 'system.setting.update'],
        ]
    ],

    [
        'name' => __('Activate Sections'),
        'permissions' => [
            'view-activate-sections' => ['system.activate.index', 'system.activate.update'],
        ]
    ],

    [
        'name' => __('Auth Sessions'),
        'permissions' => [
            'view-auth-session' => ['system.auth-sessions.index', 'system.get-auth-session', 'system.auth-sessions.show'],
            'delete-auth-session' => ['system.auth-sessions.destroy'],
            'view-log-viewer' => ['log-viewer.index'],
        ]
    ],

    [
        'name' => __('Message'),
        'permissions' => [
            'view-messages' => ['system.message.index'],
            'read-messages' => ['system.message.update-status'],
        ]
    ],


];
