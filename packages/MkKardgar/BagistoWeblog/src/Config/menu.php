<?php
return [
    [
        'key' => 'BagistoBlog',          // uniquely defined key for menu-icon
        'name' => 'وبلاگ',        //  name of menu-icon
        'route' => 'bagistoweblog.post.index',  // the route for your menu-icon
        'sort' => 6,                    // Sort number on which your menu-icon should display
        'icon-class' => 'note-icon',   //class of menu-icon
    ],
    [
        'key' => 'BagistoBlog.post',
        'name' => 'لیست مطالب',
        'route' => 'bagistoweblog.post.index',
        'sort' => 1,
        'icon-class' => ''
    ],
    [
        'key' => 'BagistoBlog.category',
        'name' => 'دسته بندی',
        'route' => 'bagistoweblog.category.index',
        'sort' => 2,
        'icon-class' => ''
    ],
    [
        'key' => 'BagistoBlog.comments',
        'name' => 'نظرات کاربران',
        'route' => 'bagistoweblog.comment.index',
        'sort' => 2,
        'icon-class' => ''
    ],
];
