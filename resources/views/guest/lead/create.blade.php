@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.success')

        <h1>Get in touch</h1>

        <form action="{{ route('contacts.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId"
                    placeholder="abc@mail.com" />
                <small id="emailHelpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                    placeholder="insert name" />
                <small id="helpId" class="form-text text-muted">Help text</small>
            </div>

            <div class="mb-3">
                <label for="text-message" class="form-label">Text message</label>
                <textarea class="form-control" name="text-message" id="text-message" rows="3"></textarea>
            </div>


            <button type="submit">Send</button>

        </form>

    </div>
@endsection
