<?php
return [
    [
        'key' => 'BagistoBlog',          // uniquely defined key for menu-icon
        'name' => 'وبلاگ',        //  name of menu-icon
        'route' => 'bagistoblog.index',  // the route for your menu-icon
        'sort' => 6,                    // Sort number on which your menu-icon should display
        'icon-class' => 'note-icon',   //class of menu-icon
        'fields' => [
            [
                'name' => 'invoice_number_prefix',
                'title' => 'admin::app.admin.system.invoice number prefix',
                'type' => 'text',
                'validation' => false,
                'channel_based' => true,
                'locale_based' => true
            ]
        ]
    ]
];
