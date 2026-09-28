<?php

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'nama_lengkap' => 'Test User',
        'email' => 'test@example.com',
        'kata_sandi' => 'kata_sandi',
        'password_confirmation' => 'kata_sandi',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});
