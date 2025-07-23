<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TranslationController extends Controller
{
    public function index()
    {
        $locales = array_filter(scandir(resource_path('lang')), function ($dir) {
            return $dir !== '.' && $dir !== '..' && is_dir(resource_path("lang/$dir"));
        });

        $files = [];

        foreach ($locales as $locale) {
            $localePath = resource_path("lang/{$locale}");
            $localeFiles = collect(File::files($localePath))->map(function ($file) {

                return pathinfo($file->getFilename(), PATHINFO_FILENAME);
            })->toArray();

            $files[$locale] = $localeFiles;
        }

        return view('translations.index', compact('files'));
    }


    public function edit($locale, $file)
    {
        $path = resource_path("lang/{$locale}/{$file}.php");

        if (!File::exists($path)) {
            abort(404, 'Translation file not found.');
        }

        $translations = File::getRequire($path);

        if (!is_array($translations)) {
            abort(500, 'Invalid translation file format.');
        }

        return view('translations.edit', [
            'locale' => $locale,
            'file' => $file,
            'translations' => $translations,
        ]);
    }

    public function update(Request $request, $locale, $file)
    {
        $path = resource_path("lang/{$locale}/{$file}.php");

        $data = $request->input('translations');

        $content = "<?php\n\nreturn " . var_export($data, true) . ";\n";

        File::put($path, $content);

        return redirect()->back()->with('success', 'تم حفظ التعديلات.');
    }
}
