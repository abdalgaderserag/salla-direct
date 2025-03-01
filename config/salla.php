<?php
$id = '21eb0b5d-a66e-4497-a136-d43252d17174';
return [
    'client' =>[
        'id' => $id,
        'secret' => '126de0910f9965382af6b7e4c7492570',
        'webhook_secret' => ''
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
            'event' => 'abandoned.cart',
        ],
        [
            'title' => 'welcome customer',
            'description' => 'create a message to welcome customers',
            'message' => '',
            'event' => 'customer.created',
        ],
        [
            'title' => 'new request',
            'description' => 'create a new request message',
            'message' => '',
            'event' => 'order.created',
        ],
        [
            'title' => 'payment on arrival confirmation',
            'description' => 'send a confirmation message to user',
            'message' => '',
            'event' => 'order.payment.updated',

        ],
        [
            'title' => 'rating',
            'description' => 'send a message to user asking for rating after order delivered',
            'message' => '',
            'event' => 'order.updated',
        ],
        [
            'title' => 'OTP',
            'description' => 'send a OTP message to user',
            'message' => '',
            'event' => 'customer.login',

        ],
        [
            'title' => 'shipment sended',
            'description' => 'send a shipment message to the user',
            'message' => '',
            'event' => 'shipment.created',

        ],
        [
            'title' => 'order is waiting for payment',
            'description' => 'send a message to user informing that the order is waiting for payment',
            'message' => '',
            'event' => 'order.payment.updated',

        ],
        [
            'title' => 'order completed',
            'description' => 'send a message to user informing that the order completed',
            'message' => '',
            'event' => 'order.updated',

        ],
        [
            'title' => 'order canceled',
            'description' => 'send a message to user informing that the order canceled',
            'message' => '',
            'event' => 'order.canceled',

        ],
        [
            'title' => 'order refunded',
            'description' => 'send a message to user informing that the order refunded',
            'message' => '',
            'event' => 'order.refunded',

        ],
        [
            'title' => 'refunding order',
            'description' => 'send a message to user informing that order refunding in progress',
            'message' => '',
            'event' => 'order.updated',

        ],
        [
            'title' => 'shipment in progress',
            'description' => 'send a message to user informing that the shipment in progress',
            'message' => '',
            'event' => 'shipment.updated',

        ],
        [
            'title' => 'shipment arrived',
            'description' => 'send a message to user informing that the shipment arrived',
            'message' => '',
            'event' => 'shipment.completed',

        ],
    ]
];
