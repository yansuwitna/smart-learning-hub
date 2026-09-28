<?php

use App\Models\Pengguna;

test('profile page is displayed', function () {
    $pengguna = Pengguna::factory()->create();

    $response = $this
        ->actingAs($pengguna)
        ->get('/profile');

    $response->assertOk();
});

test('profile information can be updated', function () {
    $pengguna = Pengguna::factory()->create();

    $response = $this
        ->actingAs($pengguna)
        ->patch('/profile', [
            'nama_lengkap' => 'Test User',
            'email' => 'test@example.com',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/profile');

    $pengguna->refresh();

    $this->assertSame('Test User', $pengguna->name);
    $this->assertSame('test@example.com', $pengguna->email);
    $this->assertNull($pengguna->email_verified_at);
});

test('email verification status is unchanged when the email address is unchanged', function () {
    $pengguna = Pengguna::factory()->create();

    $response = $this
        ->actingAs($pengguna)
        ->patch('/profile', [
            'nama_lengkap' => 'Test User',
            'email' => $pengguna->email,
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/profile');

    $this->assertNotNull($pengguna->refresh()->email_verified_at);
});

test('user can delete their account', function () {
    $pengguna = Pengguna::factory()->create();

    $response = $this
        ->actingAs($pengguna)
        ->delete('/profile', [
            'kata_sandi' => 'kata_sandi',
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/');

    $this->assertGuest();
    $this->assertNull($pengguna->fresh());
});

test('correct password must be provided to delete account', function () {
    $pengguna = Pengguna::factory()->create();

    $response = $this
        ->actingAs($pengguna)
        ->from('/profile')
        ->delete('/profile', [
            'kata_sandi' => 'wrong-password',
        ]);

    $response
        ->assertSessionHasErrors('kata_sandi')
        ->assertRedirect('/profile');

    $this->assertNotNull($pengguna->fresh());
});
