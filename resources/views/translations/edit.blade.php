<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>تعديل الترجمة - {{ $locale }}/{{ $file }}</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f5f5f5; }
        .form-group { margin-bottom: 15px; }
        label { font-weight: bold; display: block; margin-bottom: 5px; }
        input[type="text"] { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; }
        .submit-btn { padding: 10px 20px; background: #28a745; color: white; border: none; border-radius: 5px; }
        .submit-btn:hover { background: #218838; }
        .success { color: green; margin-bottom: 20px; }
    </style>
</head>
<body>

<h2>تعديل الترجمة: <code>{{ $locale }}/{{ $file }}.php</code></h2>

@if (session('success'))
    <div class="success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ url("/translations/$locale/$file") }}">
    @csrf

    @foreach ($translations as $key => $value)
        <div class="form-group">
            <label for="key_{{ $loop->index }}">{{ $key }}</label>
            <input type="text" id="key_{{ $loop->index }}" name="translations[{{ $key }}]" value="{{ $value }}">
        </div>
    @endforeach

    <button type="submit" class="submit-btn">💾 حفظ التعديلات</button>
</form>

</body>
</html>
