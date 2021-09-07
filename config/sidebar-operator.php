<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */
  'menu' => [
        [
            'icon' => 'fa fa-th-large',
            'title' => 'Dashboard',
            'url' => '/',
            'route-name' => 'admin.index'
        ],[
            'icon' => 'fa fa-file-alt',
            'title' => 'Master Surat',
            'url' => 'javascript:;',
            'caret' => true,
            'sub_menu' => [
                [
                    'url' => '/surat-masuk',
                    'title' => 'Agenda Surat Masuk',
                    'route-name' => 'admin.suratmasuk'
                ],[
                    'url' => '/surat-keluar',
                    'title' => 'Agenda Surat Keluar',
                    'route-name' => 'admin.suratkeluar'
                ],[
                    'url' => '/surat-pelayanan',
                    'title' => 'Agenda Surat Pelayanan',
                    'route-name' => 'admin.suratpelayanan'
                ],[
                    'url' => '/surat-vital',
                    'title' => 'Agenda Surat Penting',
                    'route-name' => 'admin.suratvital'
                ]]
        ],[
            'icon' => 'fa fa-question-circle',
            'title' => 'Bantuan',
            'url' => '/bantuan',
            'route-name' => 'admin.bantuan'
        ],[
            'icon' => 'fa fa-question-circle',
            'title' => 'SOP',
            'url' => '/sop',
            'route-name' => 'admin.sop'
        ]
    ]
];
