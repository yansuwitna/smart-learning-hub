<?php

use App\Models\Pengguna;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;

test('reset password link screen can be rendered', function () {
    $response = $this->get('/forgot-password');

    $response->assertStatus(200);
});

test('reset password link can be requested', function () {
    Notification::fake();

    $pengguna = Pengguna::factory()->create();

    $this->post('/forgot-password', ['email' => $pengguna->email]);

    Notification::assertSentTo($pengguna, ResetPassword::class);
});

test('reset password screen can be rendered', function () {
    Notification::fake();

    $pengguna = Pengguna::factory()->create();

    $this->post('/forgot-password', ['email' => $pengguna->email]);

    Notification::assertSentTo($pengguna, ResetPassword::class, function ($notification) {
        $response = $this->get('/reset-password/'.$notification->token);

        $response->assertStatus(200);

        return true;
    });
});

test('password can be reset with valid token', function () {
    Notification::fake();

    $pengguna = Pengguna::factory()->create();

    $this->post('/forgot-password', ['email' => $pengguna->email]);

    Notification::assertSentTo($pengguna, ResetPassword::class, function ($notification) use ($pengguna) {
        $response = $this->post('/reset-password', [
            'token' => $notification->token,
            'email' => $pengguna->email,
            'kata_sandi' => 'kata_sandi',
            'password_confirmation' => 'kata_sandi',
        ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('login'));

        return true;
    });
});
