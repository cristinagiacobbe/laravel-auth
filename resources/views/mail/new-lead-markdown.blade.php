<x-mail::message>
    # From {{ $lead->mail }}

    {{ $lead->message }}

    <x-mail::button :url="''">
        Button Text
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>
