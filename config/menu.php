<?php
    
return[
        [
        'label'=>'Dashboard',
        'route'=>'admin.index',
        'icon'=>'fa-home'
        ],
        [
        'label'=>'Category Manager',
        'route'=>'categories.index',
        'icon'=>'fa-home',
        'items'=>[
            [   'label'=>'All Category',
                'route'=>'categories.index',
            ],
            [
                'label' => 'Add Category',
                'route'=>'categories.create',
            ]

            
        ]
        ]
        
    ]
?>