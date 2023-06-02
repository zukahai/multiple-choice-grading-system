<?php
return [

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
        'route' => 'admin.question.index',
        'children' => [
            [
                'title' => 'Danh sách câu hỏi',
                'name' => 'index',
                'route' => 'admin.question.index',
            ],
            [
                'title' => 'Thêm câu hỏi',
                'name' => 'create',
                'route' => 'admin.question.showCreate',
            ],
            
          
        ],
    ],
   
];
