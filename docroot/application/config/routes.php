<?php

// Масив містить маршрути до контроллерів. Ключ масиву - це маршрут, а значення - параметри (контроллер та дія).
return [
    // Ключ - $route
    '' => [
        // Значення - $params
        'controller' => 'main',
        'action' => 'index',
    ],
    'mypage/{page:\d+}' => [
        'controller' => 'main',
        'action' => 'mypage',
    ],
    'mypage' => [
        'controller' => 'main',
        'action' => 'mypage',
    ],
    'friends' => [
        'controller' => 'main',
        'action' => 'friends',
    ],
    'post' => [
        'controller' => 'main',
        'action' => 'post',
    ],
    'postsglobal' => [
        'controller' => 'main',
        'action' => 'postsglobal',
    ],
    'globaledit/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'globaledit',
    ],
    'edit/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'edit',
    ],
    'globaldelete/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'globaldelete',
    ],
    'delete/{id:\d+}' => [
        'controller' => 'main',
        'action' => 'delete',
    ],
    'myprofile' => [
        'controller' => 'main',
        'action' => 'myprofile',
    ],
    
    // AccountController
    'register' => [
        'controller' => 'account',
        'action' => 'register',
    ],
    'login' => [
        'controller' => 'account',
        'action' => 'login',
    ],
    'logout' => [
        'controller' => 'account',
        'action' => 'logout',
    ],
];