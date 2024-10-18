<?php

use App\Models\Payment;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;

/*test('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});*/
test('not_authenticated_users_cant_create_new_payment', function () {
    $this->withoutExceptionHandling([AuthenticationException::class]);

    $user = User::factory()->create();

    $this->get(route('payments.create'))
        ->assertStatus(302)
        ->assertRedirect(route('login'));
});

test('user_can_see_form_creating_new_payment', function () {
    $this->withoutExceptionHandling();

    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('payments.create'))
        ->assertStatus(200);
    //->assertViewIs('payments.create')
    //->assertSee('Create new payment');
});

test('not_authenticated_user_cant_create_a_new_payment', function () {

    $this->withoutExceptionHandling([AuthenticationException::class]);
    $response = $this->json('POST', 'payments', [
        'email' => 'john@example.com',
        'amount' => 1000,
        'currency' => 'RUB',
        'name' => 'John Doe',
        'description' => 'A description',
        'message' => 'A description',
    ]);

    $response->assertStatus(401);

    $this->assertEquals(0, Payment::count());
});

test('user_can_create_a_new_payment', function () {

    $user = User::factory()->create();

    $response = $this->actingAs($user)->json('POST', 'payments', [
        'email' => 'john@example.com',
        'amount' => 2000,
        'currency' => 'RUB',
        'name' => 'John Doe',
        'description' => 'A description',
        'message' => 'Hello',
    ]);

    $response->assertStatus(200);

    $this->assertEquals(1, Payment::count());
    tap(Payment::first(), function (Payment $payment) use ($user) {
        $this->assertEquals($user->id, $payment->user_id);
        $this->assertEquals('john@example.com', $payment->email);
        $this->assertEquals(2000, $payment->amount);
        $this->assertEquals('RUB', $payment->currency);
        $this->assertEquals('John Doe', $payment->name);
        $this->assertEquals('A description', $payment->description);
        $this->assertEquals('Hello', $payment->message);
    });
});

test('email_field_is_required_to_create_payment', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->json('POST', 'payments', [
        'amount' => 2000,
        'currency' => 'RUB',
        'name' => 'John Doe',
        'description' => 'A description',
        'message' => 'Hello',
    ]);

    $response->assertStatus(422);

    $this->assertEquals(0, Payment::count());

    $response->assertJsonValidationErrors('email');
});

test('email_should_be_valid_to_create_payment', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->json('POST', 'payments', [
        'email' => 'not-valid',
        'amount' => 2000,
        'currency' => 'RUB',
        'name' => 'John Doe',
        'description' => 'A description',
        'message' => 'Hello',
    ]);

    $response->assertStatus(422);

    $this->assertEquals(0, Payment::count());

    $response->assertJsonValidationErrors('email');
});

test('amount_field_is_required_to_create_payment', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->json('POST', 'payments', [
        'email' => 'john@example.com',
        'currency' => 'RUB',
        'name' => 'John Doe',
        'description' => 'A description',
        'message' => 'Hello',
    ]);

    $response->assertStatus(422);

    $this->assertEquals(0, Payment::count());

    $response->assertJsonValidationErrors('amount');
});

test('amount_field_should_be_integer_to_create_payment', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->json('POST', 'payments', [
        'email' => 'john@example.com',
        'amount' => 'amount',
        'currency' => 'RUB',
        'name' => 'John Doe',
        'description' => 'A description',
        'message' => 'Hello',
    ]);

    $response->assertStatus(422);

    $this->assertEquals(0, Payment::count());

    $response->assertJsonValidationErrors('amount');
});
