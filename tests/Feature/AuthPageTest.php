<?php

test('the login route renders the sign-in form and registration switch', function () {
    $this->get(route('login'))
        ->assertOk()
        ->assertSee('Welcome Back')
        ->assertSee('Sign up for free!')
        ->assertSee('Explore Cafes')
        ->assertSee('Currently covering Pontianak only')
        ->assertSee('data-register-mode="false"', false);
});

test('the registration route renders the sign-up form and login switch', function () {
    $this->get(route('register'))
        ->assertOk()
        ->assertSee('Hello!')
        ->assertSee('Confirm Password')
        ->assertSee('Log in here!')
        ->assertSee('data-register-mode="true"', false);
});
