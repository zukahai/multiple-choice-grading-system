<?php
return [

    [
        'title' => 'Câu hỏi',
        'name' => 'question',
        'route' => 'teacher.question.index',
        'children' => [
            [
                'title' => 'Danh sách câu hỏi',
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
    [
        'title' => 'Đề thi',
        'name' => 'exam',
        'route' => 'teacher.exam.index',
        'children' => [
            [
                'title' => 'Danh sách đề thi',
                'name' => 'index',
                'route' => 'teacher.exam.index',
            ],
            [
                'title' => 'Thêm đề thi',
                'name' => 'create',
                'route' => 'teacher.exam.showCreate',
            ],
            
          
        ],
    ],
  
];

