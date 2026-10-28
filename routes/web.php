<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portfolio', [
        'name' => 'Romeo Jagonia Jr.',
        'title' => 'Programmer | Web Developer',
        'bio' => 'I am a curious and inquisitive programmer and recently have been exploring web development. '
            .'I am always looking for new challenges and opportunities to learn and grow as a developer.',
        'stack' => ['Laravel', 'PHP', 'Tailwind CSS', 'JavaScript', 'MySQL'],
        'github' => 'https://github.com/romeojrjagonia-alt',
        'linkedin' => 'https://www.linkedin.com/in/aesire56',
        'projects' => [
            [
                'title' => 'Netplay Tournament Management System',
                'description' => 'A web application that allows users to create and manage tournaments for badminton. It includes features such as player registration, match scheduling, and score tracking. Built with Laravel and Tailwind CSS.',
                'image' => 'assets/NetplayPreview.png',
                'tags' => ['Laravel', 'Livewire', 'Tailwind CSS', 'MySQL'],
                'demo' => 'https://netplay-system.up.railway.app/',
                'repo' => 'https://github.com/romeojrjagonia-alt/Netplay-Tournament-Management-System',
            ],
            [
                'title' => 'Kakegurui Site',
                'description' => 'A website showcasing the anime Kakegurui. Includes the featured characters in the series, without spoiling the plot.',
                'image' => 'assets/KakeguruiPreview.jpg',
                'tags' => ['JavaScript', 'HTML', 'CSS'],
                'demo' => 'https://kakegurui-site.vercel.app/',
                'repo' => 'https://github.com/romeojrjagonia-alt/Kakegurui-Site',
            ],
        ],
    ]);
})->name('home');
