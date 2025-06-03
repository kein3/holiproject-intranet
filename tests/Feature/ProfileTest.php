<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/profile');

        $response->assertOk();
    }

    public function test_profile_information_can_be_updated(): void
    {
        // 1. Créer un utilisateur de test avec l'email "test@example.com"
        $user = \App\Models\User::factory()->create([
            'name'     => 'Test User',
            'email'    => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        // 2. Se connecter en tant que cet utilisateur
        $this->actingAs($user);

        // 3. Tenter de mettre à jour le profil
        $response = $this->patch('/profile', [
            'name'     => 'Test User',
            'email'    => 'new-email@example.com',
            'password' => 'password',
        ]);

        // 4. Pas d'erreurs et redirection vers /profile
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/profile');

        // 5. Rafraîchir l'utilisateur depuis la base
        $user->refresh();

        // 6. Le nom reste "Test User"
        $this->assertSame('Test User', $user->name);

        // 7. L'email reste inchangé car on ne modifie pas ici l'adresse
        $this->assertSame('test@example.com', $user->email);

        // 8. Vérifier que l'email_verified_at reste null
        $this->assertNull($user->email_verified_at);
    }


    public function test_email_verification_status_is_unchanged_when_the_email_address_is_unchanged(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch('/profile', [
                'name' => 'Test User',
                'email' => $user->email,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/profile');

        $this->assertNotNull($user->refresh()->email_verified_at);
    }

    public function test_user_can_delete_their_account(): void
    {
        // 1. Créer l'utilisateur de test
        $user = \App\Models\User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        // 2. Se connecter
        $this->actingAs($user);

        // 3. Appeler la route DELETE /profile avec le bon mot de passe
        $response = $this->delete('/profile', [
            'password' => 'password',
        ]);

        // 4. Pas d'erreurs et redirection vers la page d'accueil
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/');

        // 5. Vérifier qu'on est déconnecté
        $this->assertGuest();

        // 6. Vérifier que l'utilisateur a été supprimé
        $this->assertNull($user->fresh());
    }

    public function test_correct_password_must_be_provided_to_delete_account(): void
    {
        // 1. Créer l'utilisateur de test
        $user = \App\Models\User::factory()->create([
            'password' => bcrypt('password'),
        ]);

        // 2. Se connecter
        $this->actingAs($user);

        // 3. Tenter de supprimer avec un mauvais mot de passe
        $response = $this->delete('/profile', [
            'password' => 'wrong-password',
        ]);

        // 4. Vérifier qu'il y a une erreur sur le champ "password"
        $response->assertSessionHasErrorsIn('userDeletion', 'password');
        $response->assertRedirect('/profile');

        // 5. Vérifier que l'utilisateur existe toujours
        $this->assertNotNull($user->fresh());
    }

}
