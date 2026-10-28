<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portfolio', [
        'name' => '[Your Name]',
        'title' => 'Web Developer',
        'bio' => 'I am passionate about building fast, accessible and well-designed websites. '
            .'I currently work with Laravel, Tailwind CSS and JavaScript. '
            .'[Replace this with your own 2-3 sentence bio.]',
        'stack' => ['Laravel', 'PHP', 'Tailwind CSS', 'JavaScript', 'MySQL'],
        'github' => 'https://github.com/your-username',
        'linkedin' => 'https://linkedin.com/in/your-profile',
        'projects' => [
            [
                'title' => 'Project One',
                'description' => 'A short description of what this project does, who it is for and the problem it solves. [Replace with your own.]',
                'image' => 'assets/project-1.svg',
                'tags' => ['Laravel', 'Tailwind CSS'],
                'demo' => '#',
                'repo' => 'https://github.com/your-username/project-one',
            ],
            [
                'title' => 'Project Two',
                'description' => 'Another short description highlighting the key features and the technologies you used. [Replace with your own.]',
                'image' => 'assets/project-2.svg',
                'tags' => ['JavaScript', 'HTML', 'CSS'],
                'demo' => '#',
                'repo' => 'https://github.com/your-username/project-two',
            ],
        ],
    ]);
})->name('home');
