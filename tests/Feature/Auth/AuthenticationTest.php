<?php

use App\Models\Pengguna;

test('login screen can be rendered', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
});

test('users can authenticate using the login screen', function () {
    $pengguna = Pengguna::factory()->create();

    $response = $this->post('/login', [
        'email' => $pengguna->email,
        'kata_sandi' => 'kata_sandi',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});

test('users can not authenticate with invalid password', function () {
    $pengguna = Pengguna::factory()->create();

    $this->post('/login', [
        'email' => $pengguna->email,
        'kata_sandi' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('users can logout', function () {
    $pengguna = Pengguna::factory()->create();

    $response = $this->actingAs($pengguna)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect('/');
});
