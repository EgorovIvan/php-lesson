<?php

use src\Blog\Post;
use src\User\Name;
use src\User\Person;

spl_autoload_register(function ($class) {

    $class = ltrim($class, '\\');
    $file  = '';
    if ($index = strrpos($class, '\\')) {
        $namespace = substr($class, 0, $index);
        $class = substr($class, $index + 1);
        $file  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $file .= str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

$post = new Post(
    new Person(
        new Name('Mark', 'Johannes'),
        new DateTimeImmutable()
    ),
    'Hello!'
);

print $post;
