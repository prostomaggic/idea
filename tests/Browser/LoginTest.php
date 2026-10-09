<?php

use App\Models\User;
it('logs in a user', function () {
    $user = (User::factory())->create(['password' =>'1234567890']);
    visit('/login')
        ->fill('email', $user->email)
        ->fill('password', '1234567890')
        ->press('@login-button')
        ->assertPathIs('/');

    $this->assertAuthenticated();
    expect(Auth::user())->toMatchArray([
        'email'=> $user->email,
    ]);
});

it('logs out a user', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    visit('/')
    ->press('@logout-nav-button')
        ->assertPathIs('/');

    $this->assertGuest();
});

it('requires a valid email', function () {
     visit('/login')
        ->fill('email', 'wrongEmail')
        ->fill('password', '1234567890')
        ->press('@login-button')
        ->debug()
        ->assertPathIs('/login');
});