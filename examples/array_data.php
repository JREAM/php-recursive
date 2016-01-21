<?php

$data = [
    'people' => [
        [
            'name' => 'Sammy',
            'age'  => 80,
            'gender' => 'female',
            'children' => [
                [
                    [
                        'name' => 'Thomas',
                        'age' => 58,
                        'gender' => 'male',
                        'children' => []
                    ],
                    [
                        'name' => 'Benjamin I',
                        'age' => 56,
                        'gender' => 'male',
                        'children' => [
                            [
                                [
                                    'name' => 'Benjamin II',
                                    'age' => 29,
                                    'gender' => 'male',
                                    'children' => [
                                        [
                                            'name' => 'Benjamin III',
                                            'age' => 29,
                                            'gender' => 'male',
                                            'children' => []
                                        ],
                                        [
                                            'name' => 'Benjamin IIII Jr.',
                                            'age' => 28,
                                            'gender' => 'male',
                                            'children' => []
                                        ]
                                    ]
                                ],
                                [
                                    'name' => 'Anna',
                                    'age' => 32,
                                    'gender' => 'female',
                                    'children' => []
                                ],
                            ]
                        ]
                    ]
                ]
            ],
        ]
    ]
];
