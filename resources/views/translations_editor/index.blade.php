<h2>اختر ملف ترجمة:</h2>

@foreach($files as $locale => $localeFiles)
    <h3>{{ strtoupper($locale) }}</h3>
    <ul>
        @foreach ($localeFiles as $file)
            <li><a href="{{ url("/translations/$locale/$file") }}">{{ $file }}</a></li>
        @endforeach
    </ul>
@endforeach
