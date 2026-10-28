<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $name }} | Portfolio</title>
    <meta name="description" content="Personal portfolio of {{ $name }}, {{ $title }}.">
    <link rel="icon" href="{{ asset('assets/favicon.svg') }}" type="image/svg+xml">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-slate-800 antialiased transition-colors duration-300 dark:bg-slate-900 dark:text-slate-100">
<script>
    // Apply the saved theme before first paint to avoid a light flash.
    try {
        var t = localStorage.getItem('theme');
        if (t ? t === 'dark' : matchMedia('(prefers-color-scheme: dark)').matches) document.body.classList.add('dark');
    } catch (e) {}
</script>

{{-- Header / navigation --}}
<header class="sticky top-0 z-40 border-b border-slate-200 bg-white/85 backdrop-blur transition-colors duration-300 dark:border-slate-800 dark:bg-slate-900/85">
    <nav class="mx-auto flex max-w-5xl items-center justify-between px-5 py-3" aria-label="Main">
        <a href="#home" class="text-lg font-bold tracking-tight">{{ $name }}</a>

        <div class="flex items-center gap-2">
            <ul class="hidden items-center gap-6 text-sm font-medium md:flex">
                <li><a href="#home" class="transition-all duration-300 ease-in-out hover:text-indigo-600 dark:hover:text-indigo-400">Home</a></li>
                <li><a href="#projects" class="transition-all duration-300 ease-in-out hover:text-indigo-600 dark:hover:text-indigo-400">Projects</a></li>
                <li><a href="#contact" class="transition-all duration-300 ease-in-out hover:text-indigo-600 dark:hover:text-indigo-400">Contact</a></li>
            </ul>

            <button type="button" data-theme-toggle aria-pressed="false" aria-label="Toggle dark mode"
                    class="rounded-full p-2 transition-all duration-300 ease-in-out hover:bg-slate-100 dark:hover:bg-slate-800">
                <svg class="h-5 w-5 dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12.8A9 9 0 1 1 11.2 3a7 7 0 0 0 9.8 9.8Z"/></svg>
                <svg class="hidden h-5 w-5 dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><circle cx="12" cy="12" r="4"/><path stroke-linecap="round" d="M12 2v2m0 16v2M4.9 4.9l1.4 1.4m11.4 11.4 1.4 1.4M2 12h2m16 0h2M4.9 19.1l1.4-1.4m11.4-11.4 1.4-1.4"/></svg>
            </button>

            <button type="button" data-menu-toggle aria-expanded="false" aria-label="Toggle menu"
                    class="rounded-full p-2 transition-all duration-300 ease-in-out hover:bg-slate-100 md:hidden dark:hover:bg-slate-800">
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true"><path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>
    </nav>

    <ul data-menu class="hidden border-t border-slate-200 px-5 py-2 text-sm font-medium md:hidden dark:border-slate-800">
        <li><a href="#home" class="block py-2">Home</a></li>
        <li><a href="#projects" class="block py-2">Projects</a></li>
        <li><a href="#contact" class="block py-2">Contact</a></li>
    </ul>
</header>

<main>
    {{-- Home / Hero --}}
    <section id="home" class="mx-auto flex max-w-5xl flex-col-reverse items-center gap-10 px-5 py-16 md:flex-row md:py-24">
        <div class="text-center md:text-left">
            <p class="mb-2 text-sm font-semibold uppercase tracking-widest text-indigo-600 dark:text-indigo-400">Hello, I'm</p>
            <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl">{{ $name }}</h1>
            <p class="mt-2 text-xl font-medium text-slate-500 dark:text-slate-400">{{ $title }}</p>
            <p class="mt-5 max-w-xl leading-relaxed text-slate-600 dark:text-slate-300">{{ $bio }}</p>

            <ul class="mt-5 flex flex-wrap justify-center gap-2 md:justify-start">
                @foreach ($stack as $tech)
                    <li class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-semibold text-indigo-700 dark:bg-indigo-500/15 dark:text-indigo-300">{{ $tech }}</li>
                @endforeach
            </ul>

            <div class="mt-8 flex flex-wrap justify-center gap-3 md:justify-start">
                <a href="#projects" class="rounded-lg bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow transition-all duration-300 ease-in-out hover:-translate-y-0.5 hover:bg-indigo-700 hover:shadow-lg">View Projects</a>
                <a href="#contact" class="rounded-lg border border-slate-300 px-5 py-2.5 text-sm font-semibold transition-all duration-300 ease-in-out hover:-translate-y-0.5 hover:border-indigo-600 hover:text-indigo-600 dark:border-slate-600 dark:hover:border-indigo-400 dark:hover:text-indigo-400">Contact Me</a>
            </div>
        </div>

        <img src="{{ asset('assets/profile.svg') }}" alt="Profile picture of {{ $name }}" width="288" height="288"
             class="h-48 w-48 shrink-0 rounded-full border-4 border-indigo-500 object-cover shadow-xl transition-all duration-300 ease-in-out hover:scale-105 sm:h-60 sm:w-60 md:h-72 md:w-72">
    </section>

    {{-- Projects --}}
    <section id="projects" class="bg-slate-50 py-16 transition-colors duration-300 dark:bg-slate-800/50">
        <div class="mx-auto max-w-5xl px-5">
            <h2 class="text-3xl font-bold tracking-tight">Projects</h2>
            <p class="mt-2 text-slate-600 dark:text-slate-400">A selection of things I've built.</p>

            <div class="mt-10 grid gap-8 md:grid-cols-2">
                @foreach ($projects as $project)
                    <article class="flex flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition-all duration-300 ease-in-out hover:-translate-y-1 hover:shadow-xl dark:border-slate-700 dark:bg-slate-800">
                        <img src="{{ asset($project['image']) }}" alt="Preview of {{ $project['title'] }}" width="640" height="360" loading="lazy"
                             class="aspect-video w-full object-cover">
                        <div class="flex flex-1 flex-col p-6">
                            <h3 class="text-xl font-semibold">{{ $project['title'] }}</h3>
                            <p class="mt-2 flex-1 text-sm leading-relaxed text-slate-600 dark:text-slate-300">{{ $project['description'] }}</p>

                            <ul class="mt-4 flex flex-wrap gap-2">
                                @foreach ($project['tags'] as $tag)
                                    <li class="rounded-full bg-slate-100 px-2.5 py-0.5 text-xs font-medium text-slate-600 dark:bg-slate-700 dark:text-slate-300">{{ $tag }}</li>
                                @endforeach
                            </ul>

                            <div class="mt-5 flex gap-3">
                                <a href="{{ $project['demo'] }}" target="_blank" rel="noopener"
                                   class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white transition-all duration-300 ease-in-out hover:bg-indigo-700">Live Demo</a>
                                <a href="{{ $project['repo'] }}" target="_blank" rel="noopener"
                                   class="rounded-lg border border-slate-300 px-4 py-2 text-sm font-semibold transition-all duration-300 ease-in-out hover:border-indigo-600 hover:text-indigo-600 dark:border-slate-600 dark:hover:border-indigo-400 dark:hover:text-indigo-400">GitHub Repo</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Contact --}}
    <section id="contact" class="mx-auto max-w-2xl px-5 py-16 md:py-24">
        <h2 class="text-3xl font-bold tracking-tight">Contact</h2>
        <p class="mt-2 text-slate-600 dark:text-slate-400">Have a question or want to work together? Send me a message.</p>

        <form id="contact-form" class="mt-8 space-y-5" novalidate>
            <div>
                <label for="name" class="mb-1 block text-sm font-medium">Name</label>
                <input id="name" name="name" type="text" required autocomplete="name"
                       class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 transition-all duration-300 ease-in-out focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 dark:border-slate-600 dark:bg-slate-800">
            </div>
            <div>
                <label for="email" class="mb-1 block text-sm font-medium">Email</label>
                <input id="email" name="email" type="email" required autocomplete="email"
                       class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 transition-all duration-300 ease-in-out focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 dark:border-slate-600 dark:bg-slate-800">
            </div>
            <div>
                <label for="message" class="mb-1 block text-sm font-medium">Message</label>
                <textarea id="message" name="message" rows="5" required
                          class="w-full rounded-lg border border-slate-300 bg-white px-4 py-2.5 transition-all duration-300 ease-in-out focus:border-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 dark:border-slate-600 dark:bg-slate-800"></textarea>
            </div>
            <button type="submit"
                    class="rounded-lg bg-indigo-600 px-6 py-2.5 text-sm font-semibold text-white shadow transition-all duration-300 ease-in-out hover:-translate-y-0.5 hover:bg-indigo-700 hover:shadow-lg">Send Message</button>
        </form>
    </section>
</main>

<footer class="border-t border-slate-200 py-8 text-center text-sm text-slate-500 transition-colors duration-300 dark:border-slate-800 dark:text-slate-400">
    <div class="mb-2 flex justify-center gap-5">
        <a href="{{ $github }}" target="_blank" rel="noopener" class="transition-all duration-300 ease-in-out hover:text-indigo-600 dark:hover:text-indigo-400">GitHub</a>
        <a href="{{ $linkedin }}" target="_blank" rel="noopener" class="transition-all duration-300 ease-in-out hover:text-indigo-600 dark:hover:text-indigo-400">LinkedIn</a>
    </div>
    &copy; {{ date('Y') }} {{ $name }}. All rights reserved.
</footer>

{{-- Success / error toast --}}
<div id="toast" role="status" aria-live="polite"
     class="pointer-events-none fixed bottom-6 left-1/2 z-50 max-w-[90vw] -translate-x-1/2 translate-y-4 rounded-lg bg-emerald-600 px-5 py-3 text-sm font-medium text-white opacity-0 shadow-lg transition-all duration-300 ease-in-out"></div>
</body>
</html>
