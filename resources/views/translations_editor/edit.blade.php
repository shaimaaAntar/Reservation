<h2>تعديل ملف: {{ $locale }}/{{ $file }}</h2>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form method="POST" action="{{ url("/translations/$locale/$file") }}">
    @csrf
    <textarea name="content" style="width:100%; height:500px;">{{ $content }}</textarea>
    <br>
    <button type="submit">💾 حفظ التعديلات</button>
</form>
