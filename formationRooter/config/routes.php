<?php

$router->map('GET', '/', 'home');
$router->map('GET', '/nous-contacter', 'contact', 'contact');
$router->map('GET', '/blog/[$:slug]-[i:id]', 'blog/article');
