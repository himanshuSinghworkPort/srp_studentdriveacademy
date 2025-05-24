@extends('layouts.app')

@section('content')
    <h2>Your Profile</h2>
    <div class="profile-info">
        <h3>Account Details</h3>
        <p>Name: {{ Auth::user()->name }}</p>
        <p>Email: {{ Auth::user()->email }}</p>
        <form action="{{ route('profile.edit') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit">Edit Profile</button>
        </form>
    </div>
@endsection
