<?php
return [

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
  
];
