<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TranslationEditorController extends Controller
{
    public function index()
    {
        $locales = array_filter(scandir(resource_path('lang')), function ($d) {
            return $d !== '.' && $d !== '..';
        });

        $files = [];
        foreach ($locales as $locale) {
            $path = resource_path("lang/$locale");
            if (!is_dir($path)) continue;

            $files[$locale] = collect(File::files($path))->map(function ($file) {
                return $file->getFilename();
            })->toArray();
        }

        return view('translations_editor.index', compact('files'));
    }

    public function edit($locale, $file)
    {
        $path = resource_path("lang/$locale/$file");

        if (!File::exists($path)) {
            abort(404, "File not found.");
        }

        $content = File::get($path);

        return view('translations_editor.edit', compact('locale', 'file', 'content'));
    }

    public function update(Request $request, $locale, $file)
    {
        $path = resource_path("lang/$locale/$file");

        File::put($path, $request->input('content'));

        return redirect()->back()->with('success', 'تم حفظ التعديلات بنجاح.');
    }
}
