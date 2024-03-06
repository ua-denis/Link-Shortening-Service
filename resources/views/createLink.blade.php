@extends('layouts.app')

@section('content')
    <h2>Create Short Link</h2>
    <form action="{{ route('links.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="original_url">Original URL</label>
            <input type="url" class="form-control" id="original_url" name="original_url" required>
        </div>
        <div class="form-group">
            <label for="transition_limit">Transition Limit (0 for no limit)</label>
            <input type="number" min="0" class="form-control" id="transition_limit" name="transition_limit" required>
        </div>
        <div class="form-group">
            <label for="lifetime">Link Lifetime (up to 24 hours)</label>
            <input type="number" min="1" class="form-control" id="lifetime" name="lifetime" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Short Link</button>
    </form>
@endsection
