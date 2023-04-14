<?php

// Масив доступних сторінок для різних типів користувачів. 
return [
    // Сторінки доступні для всіх типів користувачів. 
    'all' => [
    ],
    // Сторінки доступні для авторизовних користувачів. 
    'authorize' => [
        'logout',
    ],
    // Сторінки доступні для користувачів, які не авторизовані у системі.
    'guest' => [
        'register',
        'login',
    ],
];