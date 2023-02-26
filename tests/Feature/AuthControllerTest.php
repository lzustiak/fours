<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register(): void
    {
        $user = User::factory()->make();

        $this->followingRedirects()
            ->post('/register', [
                'name' => $user->name,
                'password' => 'password'
            ])
            ->assertInertia(fn (Assert $page) => $page
                ->component('Home'));

        $this->assertDatabaseHas('users', $user->toArray());

        $this->assertAuthenticated('web');
    }

    public function test_user_can_view_login_page(): void
    {
        $this->get('/login')
            ->assertInertia(fn (Assert $page) => $page
                ->component('Login'));
    }

    public function test_user_can_login(): void
    {
        $user = User::factory()->create();

        $this->followingRedirects()
            ->post('/login', [
                'name' => $user->name,
                'password' => 'password'
            ])
            ->assertInertia(fn (Assert $page) => $page
                ->component('Home'));

        $this->assertAuthenticatedAs($user, 'web');
    }
}
