<?php

return [
    'currency' => 'USD',
    'avatar' => [
        'path' => 'avatars/',
        'disk' => env('AVATAR_FILESYSTEM_DRIVER', env('FILESYSTEM_DRIVER', 'public')),
        'quality' => 60,
        'sizes' => [
            [
                'suffix' => 'thumb',
                'dimension' => 80,
                'encode' => 'jpg'
            ],
            [
                'suffix' => 'small',
                'dimension' => 256,
                'encode' => 'jpg'
            ]
        ]
    ],
    'files' => [
        'identity' => [
            'path' => 'identities/',
            'disk' => env('IDENTITY_FILESYSTEM_DRIVER', env('FILESYSTEM_DRIVER', 'public')),
        ],
        'pop' => [
            'path' => 'pop_images/',
            'disk' => env('POP_FILESYSTEM_DRIVER', env('FILESYSTEM_DRIVER', 'public')),
        ]
    ],
    'status' => [
        'pending' => [
            'name' => 'Pending',
            'theme' => 'warning',
        ],
        'hold' => [
            'name' => 'Hold',
            'theme' => 'warning',
        ],
        'altered' => [
            'name' => 'Altered',
            'theme' => 'warning',
        ],
        'approved' => [
            'name' => 'Approved',
            'theme' => 'success',
        ],
        'active' => [
            'name' => 'Active',
            'theme' => 'success',
        ],
        'incomplete' => [
            'name' => 'Incomplete',
            'theme' => 'danger',
        ],
        'blocked' => [
            'name' => 'Blocked',
            'theme' => 'danger',
        ],
        'block' => [
            'name' => 'Blocked',
            'theme' => 'danger',
        ],
        'banned' => [
            'name' => 'Banned',
            'theme' => 'danger',
        ],
        'unpaid' => [
            'name' => 'Unpaid',
            'theme' => 'warning',
        ],
        'paid' => [
            'name' => 'Paid',
            'theme' => 'primary',
        ],
        'returned' => [
            'name' => 'Returned',
            'theme' => 'primary',
        ],
        'requested' => [
            'name' => 'Requested',
            'theme' => 'primary',
        ],
        'due' => [
            'name' => 'Due',
            'theme' => 'danger',
        ],
        'rejected' => [
            'name' => 'Rejected',
            'theme' => 'danger',
        ],
        'used' => [
            'name' => 'Used',
            'theme' => 'warning',
        ],
        'unused' => [
            'name' => 'Unused',
            'theme' => 'primary',
        ]
    ],
    'investment' => [
        'percent' => 20,
    ],
    'widgets' => [
        'whatsapp' => env('SITE_WHATSAPP_WIDGET')
    ],
    'address' => env('SITE_ADDRESS'),
    'mail' => [
        'official' => env('SITE_MAIL_OFFICIAL'),
        'register' => env('SITE_MAIL_REGISTER'),
        'support' => env('SITE_MAIL_SUPPORT'),
    ],
    'phone' => [
        'official' => env('SITE_PHONE_OFFICIAL'),
        'support' => env('SITE_PHONE_SUPPORT'),
    ]
];
