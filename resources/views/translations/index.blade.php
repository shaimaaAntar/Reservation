<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>قائمة ملفات الترجمة</title>
</head>
<body>
<h2>اختر ملف الترجمة للتعديل</h2>

@foreach ($files as $locale => $localeFiles)
    <h3>{{ strtoupper($locale) }}</h3>
    <ul>
        @foreach ($localeFiles as $file)
            <li>
                <a href="{{ url("translations/$locale/$file") }}">{{ $file }}.php</a>
            </li>
        @endforeach
    </ul>
@endforeach
</body>
</html>
