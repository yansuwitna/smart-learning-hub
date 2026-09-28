<?php

use App\Models\Pengguna;

test('confirm password screen can be rendered', function () {
    $pengguna = Pengguna::factory()->create();

    $response = $this->actingAs($pengguna)->get('/confirm-password');

    $response->assertStatus(200);
});

test('password can be confirmed', function () {
    $pengguna = Pengguna::factory()->create();

    $response = $this->actingAs($pengguna)->post('/confirm-password', [
        'kata_sandi' => 'kata_sandi',
    ]);

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();
});

test('password is not confirmed with invalid password', function () {
    $pengguna = Pengguna::factory()->create();

    $response = $this->actingAs($pengguna)->post('/confirm-password', [
        'kata_sandi' => 'wrong-password',
    ]);

    $response->assertSessionHasErrors();
});
