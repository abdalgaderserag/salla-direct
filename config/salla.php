<?php
$id = '9fc6b8f8-f608-484c-a0b1-5026512246e3';
return [
    'client' =>[
        'id' => $id,
        'secret' => 'eb814913ec536f7e2b63c52417da3013',
        'webhook_secret' => 'b5c9c41c01f0ce26062dafa04993d463'
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
            'type' => 'abandoned.cart',
        ],
        [
            'title' => 'welcome customer',
            'description' => 'create a message to welcome customers',
            'message' => '',
            'event' => 'customer.created',
            'type' => 'customer.created',
        ],
        [
            'title' => 'new request',
            'description' => 'create a new request message',
            'message' => '',
            'event' => 'order.created',
            'type' => 'order.created',
        ],
        [
            'title' => 'payment on arrival confirmation',
            'description' => 'send a confirmation message to user',
            'message' => '',
            'event' => 'order.payment.updated',
            'type' => 'payment.arrival'
        ],
        [
            'title' => 'rating',
            'description' => 'send a message to user asking for rating after order delivered',
            'message' => '',
            'event' => 'review.added',
            'type' => 'review.added',
        ],
        [
            'title' => 'OTP',
            'description' => 'send a OTP message to user',
            'message' => '',
            'event' => 'customer.login',
            'type' => 'customer.login',
        ],
        [
            'title' => 'shipment sended',
            'description' => 'send a shipment message to the user',
            'message' => '',
            'event' => 'shipment.created',
            'type' => 'shipment.created',
        ],
        [
            'title' => 'order is waiting for payment',
            'description' => 'send a message to user informing that the order is waiting for payment',
            'message' => '',
            'event' => 'order.payment.updated',
            'type' => 'payment.waiting'
        ],
        [
            'title' => 'order completed',
            'description' => 'send a message to user informing that the order completed',
            'message' => '',
            'event' => 'order.updated',
            'type'=> 'order.completed'
        ],
        [
            'title' => 'order canceled',
            'description' => 'send a message to user informing that the order canceled',
            'message' => '',
            'event' => 'order.canceled',
            'type' => 'order.canceled',
        ],
        [
            'title' => 'order refunded',
            'description' => 'send a message to user informing that the order refunded',
            'message' => '',
            'event' => 'order.refunded',
            'type' => 'order.refunded',
        ],
        [
            'title' => 'refunding order',
            'description' => 'send a message to user informing that order refunding in progress',
            'message' => '',
            'event' => 'order.updated',
            'type' => 'refunding.order',
        ],
        [
            'title' => 'shipment in progress',
            'description' => 'send a message to user informing that the shipment in progress',
            'message' => '',
            'event' => 'shipment.updated',
            'type' => 'shipment.updated',
        ],
        [
            'title' => 'shipment arrived',
            'description' => 'send a message to user informing that the shipment arrived',
            'message' => '',
            'event' => 'shipment.completed',
            'type' => 'shipment.completed',
        ],
    ]
];
