<?php
    
return[
        [
        'label'=>'Category Managerment',
        'route'=>'categories.index',
        'icon'=>'fa-table',
        'items'=>[
            [   'label'=>'All Category',
                'route'=>'categories.index',
            ],
            [
                'label' => 'Add Category',
                'route'=>'categories.create',
            ]

            
         ]
        ],
        [
        'label'=>'Brand Managerment',
        'route'=>'brands.index',
        'icon'=>'fa-box ',
        'items'=>[
            [   'label'=>'All Brand',
                'route'=>'brands.index',
            ],
            [
                'label' => 'Add Brand',
                'route'=>'brands.create',
            ]
        ]  
    ],
    [
        'label'=>'Product Managerment',
        'route'=>'products.index',
        'icon'=>'fa-box ',
        'items'=>[
            [   'label'=>'All Product',
                'route'=>'products.index',
            ],
            [
                'label' => 'Add Product',
                'route'=>'products.create',
            ]
        ]  
    ]

]
?>