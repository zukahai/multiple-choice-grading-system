<?php
return [
    // [
    //     'title' => 'Tài khoản',
    //     'name' => 'account',
    //     'route' => 'admin.account.index',
    //     'children' => [
    //         [
    //             'title' => 'Danh sách tài khoản',
    //             'name' => 'index',
    //             'route' => 'admin.account.index',
    //         ],
    //         [
    //             'title' => 'Thêm tài khoản',
    //             'name' => 'create',
    //             'route' => 'admin.account.showcreate',
    //         ],
           
    //     ],
    // ],
    [
        'title' => 'Phân quyền',
        'name' => 'role',
        'route' => 'admin.role.index',
        'children' => [
            [
                'title' => 'Danh sách quyền',
                'name' => 'index',
                'route' => 'admin.role.index',
            ],
            [
                'title' => 'Thêm quyền',
                'name' => 'create',
                'route' => 'admin.role.showCreate',
            ],
          
        ],
    ],
    [
        'title' => 'Yêu cầu làm giáo viên',
        'name' => 'requestTeacher',
        'route' => 'admin.requestTeacher.index',
        'children' => [
            [
                'title' => 'Danh sách yêu cầu',
                'name' => 'index',
                'route' => 'admin.requestTeacher.index',
            ],
            
          
        ],
    ],
    [
        'title' => 'Câu hỏi',
        'name' => 'question',
        'route' => 'teacher.question.index',
        'children' => [
            [
                'title' => 'Danh sách yêu cầu',
                'name' => 'index',
                'route' => 'teacher.question.index',
            ],
            [
                'title' => 'Thêm câu hỏi',
                'name' => 'create',
                'route' => 'teacher.question.showCreate',
            ],
            
          
        ],
    ],
    // [
    //     'title' => 'Đăng Nhập',
    //     'name' => 'Login',
    //     'route' => 'login',
    //     'children' => [
    //         [
    //             'title' => 'Đăng Nhập',
    //             'name' => 'login',
    //             'route' => 'login',
    //         ],
    //         [
    //             'title' => 'Đăng xuất',
    //             'name' => 'logout',
    //             'route' => 'admin.role.showcreate',
    //         ]
    //     ],
    // ],
    // [
    //     'title' => 'Sản phẩm',
    //     'name' => 'product',
    //     'route' => 'product',
    //     'children' => [
    //         [
    //             'title' => 'Danh sách sản phẩm',
    //             'name' => 'index',
    //             'route' => 'admin.product.index',
    //         ],
    //         [
    //             'title' => 'Thêm sản phẩm',
    //             'name' => 'create',
    //             'route' => 'admin.product.showcreate',
    //         ]
    //     ],
    // ],
    // [
    //     'title' => 'Loại sản phẩm',
    //     'name' => 'type_product',
    //     'route' => 'typeProduct',
    //     'children' => [
    //         [
    //             'title' => 'Danh sách loại sản phẩm',
    //             'name' => 'index',
    //             'route' => 'admin.type_product.index',
    //         ],
    //         [
    //             'title' => 'Thêm sản phẩm',
    //             'name' => 'create',
    //             'route' => 'admin.type_product.showcreate',
    //         ]
    //     ],
    // ],
    // [
    //     'title' => 'Kích cỡ sản phẩm',
    //     'name' => 'product_size',
    //     'route' => 'product_size',
    //     'children' => [
    //         [
    //             'title' => 'Danh sách kích cỡ sản phẩm',
    //             'name' => 'index',
    //             'route' => 'admin.product_size.index',
    //         ],
    //         [
    //             'title' => 'Thêm kích cỡ sản phẩm',
    //             'name' => 'create',
    //             'route' => 'admin.product_size.showcreate',
    //         ]
    //     ],
    // ],
    // [
    //     'title' => 'Kích cỡ',
    //     'name' => 'size',
    //     'route' => 'size',
    //     'children' => [
    //         [
    //             'title' => 'Danh sách kích cỡ',
    //             'name' => 'index',
    //             'route' => 'admin.size.index',
    //         ],
    //         [
    //             'title' => 'Thêm kích cỡ',
    //             'name' => 'create',
    //             'route' => 'admin.size.showcreate',
    //         ]
    //     ],
    // ],
    // [
    //     'title' => 'Đơn đặt hàng',
    //     'name' => 'order',
    //     'route' => 'order',
    //     'children' => [
    //         [
    //             'title' => 'Danh sách đơn đặt hàng',
    //             'name' => 'indexAdmin',
    //             'route' => 'admin.order.indexAdmin',
    //         ],
           
    //     ],
    // ],
    // [
    //     'title' => 'Lịch sử giao dịch',
    //     'name' => 'autoBank',
    //     'route' => 'autoBank',
    //     'children' => [
    //         [
    //             'title' => 'Danh sách các lịch sử giao dịch',
    //             'name' => 'index',
    //             'route' => 'admin.autoBank.index',
    //         ],
           
    //     ],
    // ],
];
