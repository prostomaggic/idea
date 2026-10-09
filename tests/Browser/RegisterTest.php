<?php
it('registers a user', function () {
    visit('/register')
        ->fill('name', 'Alex')
        ->fill('email', 'alex@example.com')
        ->fill('password', '1234567890')
        ->press('@register-button')
        ->assertPathIs('/');

    $this->assertAuthenticated();
    $this->assertDatabaseHas('users',[
        'name'=> 'Alex',
    ]);
});