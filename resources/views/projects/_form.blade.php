{{-- Protege de ataques XSS --}}
@csrf

<input type="text" id="title" name="title" placeholder="Title..." value="{{ old('title', $project->title) }}" autofocus><br>
{!! $errors->first('title', '<small style="color: red">:message</small><br>') !!}

<textarea id="description" name="description" cols="30" rows="10" placeholder="Description...">{{ old('description', $project->description) }}</textarea><br>
{!! $errors->first('description', '<small style="color: red">:message</small><br>') !!}

<button>@lang($button)</button>
