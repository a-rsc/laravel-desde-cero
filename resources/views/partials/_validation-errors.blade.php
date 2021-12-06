@if ($errors->any())
{{-- {{ var_dump($errors->all()) }} --}}
<ul style="color: red;">
    @foreach ($errors->all() as $error)
        <li><small>{{ $error }}</small></li>
    @endforeach
</ul>
@endif
