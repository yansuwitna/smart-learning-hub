<?php

use App\Models\Pengguna;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;

test('email verification screen can be rendered', function () {
    $pengguna = Pengguna::factory()->unverified()->create();

    $response = $this->actingAs($pengguna)->get('/verify-email');

    $response->assertStatus(200);
});

test('email can be verified', function () {
    $pengguna = Pengguna::factory()->unverified()->create();

    Event::fake();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $pengguna->id, 'hash' => sha1($pengguna->email)]
    );

    $response = $this->actingAs($pengguna)->get($verificationUrl);

    Event::assertDispatched(Verified::class);
    expect($pengguna->fresh()->hasVerifiedEmail())->toBeTrue();
    $response->assertRedirect(route('dashboard', absolute: false).'?verified=1');
});

test('email is not verified with invalid hash', function () {
    $pengguna = Pengguna::factory()->unverified()->create();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $pengguna->id, 'hash' => sha1('wrong-email')]
    );

    $this->actingAs($pengguna)->get($verificationUrl);

    expect($pengguna->fresh()->hasVerifiedEmail())->toBeFalse();
});
