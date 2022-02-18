@extends('layouts.dashboard')

@section('content')
    <section class="content-header">
        <h1>
            Dashboard
            <small>Edit Profile</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Profile</li>
        </ol>
    </section>

    <!-- Page Content -->
    <section class="content">
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')
            <x-jet-section-border />
        @endif

        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            @livewire('profile.update-password-form')
            <x-jet-section-border />
        @endif
    </section>
    <!-- END Page Content -->
@endsection
