<?php

use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;

test('password can be updated', function () {
    $pengguna = Pengguna::factory()->create();

    $response = $this
        ->actingAs($pengguna)
        ->from('/profile')
        ->put('/password', [
            'current_password' => 'kata_sandi',
            'kata_sandi' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/profile');

    $this->assertTrue(Hash::check('new-password', $pengguna->refresh()->password));
});

test('correct password must be provided to update password', function () {
    $pengguna = Pengguna::factory()->create();

    $response = $this
        ->actingAs($pengguna)
        ->from('/profile')
        ->put('/password', [
            'current_password' => 'wrong-password',
            'kata_sandi' => 'new-password',
            'password_confirmation' => 'new-password',
        ]);

    $response
        ->assertSessionHasErrors('current_password')
        ->assertRedirect('/profile');
});
