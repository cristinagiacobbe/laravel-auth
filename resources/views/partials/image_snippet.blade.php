@if (Str::startsWith($project->cover_image, 'https://'))
    <img width="100" src="{{ $project->cover_image }}" alt="">
@else
    <img width="100" src="{{ asset('storage/' . $project->cover_image) }}" alt="">
@endif
