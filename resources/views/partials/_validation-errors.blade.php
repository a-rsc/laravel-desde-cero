@if ($errors->any())
{{-- {{ var_dump($errors->all()) }} --}}
<ul class="validation-errors">
    @foreach ($errors->all() as $error)
        <li><small>{{ $error }}</small></li>
    @endforeach
</ul>
@endif
