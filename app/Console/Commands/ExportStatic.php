<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ExportStatic extends Command
{
    protected $signature = 'portfolio:export {--path=dist : Output folder, relative to the project root}';

    protected $description = 'Render the portfolio to plain static HTML so it can be hosted without PHP (e.g. Vercel)';

    public function handle(Kernel $kernel): int
    {
        if (File::exists(public_path('hot'))) {
            $this->error('public/hot exists (Vite dev server running). Stop `npm run dev` and run `npm run build` first.');

            return self::FAILURE;
        }

        if (! File::exists(public_path('build/manifest.json'))) {
            $this->error('public/build is missing. Run `npm run build` first.');

            return self::FAILURE;
        }

        $out = base_path($this->option('path'));
        File::deleteDirectory($out);
        File::ensureDirectoryExists($out);

        // Render "/" through the real router so the data in routes/web.php is reused.
        $request = Request::create('/');
        $response = $kernel->handle($request);

        if ($response->getStatusCode() !== 200) {
            $this->error('Rendering "/" failed with HTTP '.$response->getStatusCode());

            return self::FAILURE;
        }

        // Turn absolute URLs (http://localhost/build/...) into root-relative ones (/build/...).
        $html = str_replace(rtrim($request->root(), '/').'/', '/', $response->getContent());
        File::put($out.'/index.html', $html);

        File::copyDirectory(public_path('build'), $out.'/build');
        File::copyDirectory(public_path('assets'), $out.'/assets');
        File::copy(public_path('favicon.ico'), $out.'/favicon.ico');
        File::copy(public_path('robots.txt'), $out.'/robots.txt');

        $this->info('Static site exported to '.$out);

        return self::SUCCESS;
    }
}
