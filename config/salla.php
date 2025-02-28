<?php
$id = '21eb0b5d-a66e-4497-a136-d43252d17174';
return [
    'client' =>[
        'id' => $id,
        'secret' => '126de0910f9965382af6b7e4c7492570',
    ],

    'urls' => [
        'auth' => 'https://accounts.salla.sa/oauth2/auth',
        'token' => 'https://accounts.salla.sa/oauth2/token',
        'store-info' => 'https://api.salla.dev/admin/v2/store/info',
        'install' => 'https://apps.salla.sa/ar/app/'
    ],

    'events' => [
        [
            'title' => 'abounded carts',
            'description' => 'create a message to remind customers of there abounded carts',
            'message' => '',
        ],
        [
            'title' => 'welcome customer',
            'description' => 'create a message to welcome customers',
            'message' => '',
        ],
        [
            'title' => 'new request',
            'description' => 'create a new request message',
            'message' => '',
        ],
        [
            'title' => 'payment on arrival confirmation',
            'description' => 'send a confirmation message to user',
            'message' => '',
        ],
        [
            'title' => 'rating',
            'description' => 'send a message to user asking for rating after order delivered',
            'message' => '',
        ],
        [
            'title' => 'OTP',
            'description' => 'send a OTP message to user',
            'message' => '',
        ],
        [
            'title' => 'shipment sended',
            'description' => 'send a shipment message to the user',
            'message' => '',
        ],
        [
            'title' => 'order is waiting for payment',
            'description' => 'send a message to user informing that the order is waiting for payment',
            'message' => '',
        ],
        [
            'title' => 'order completed',
            'description' => 'send a message to user informing that the order completed',
            'message' => '',
        ],
        [
            'title' => 'order canceled',
            'description' => 'send a message to user informing that the order canceled',
            'message' => '',
        ],
        [
            'title' => 'order refunded',
            'description' => 'send a message to user informing that the order refunded',
            'message' => '',
        ],
        [
            'title' => 'refunding order',
            'description' => 'send a message to user informing that order refunding in progress',
            'message' => '',
        ],
        [
            'title' => 'shipment in progress',
            'description' => 'send a message to user informing that the shipment in progress',
            'message' => '',
        ],
        [
            'title' => 'shipment arrived',
            'description' => 'send a message to user informing that the shipment arrived',
            'message' => '',
        ],

        // 'abandoned.cart',
        // 'customer.created',
        // 'customer.login',
        // 'order.created',
        // 'order.updated',
        // 'order.payment.updated',
        // 'order.refunded',
        // 'order.cancelled',
        // 'shipment.created',
    ]
];
