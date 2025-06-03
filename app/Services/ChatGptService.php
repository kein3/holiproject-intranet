<?php

namespace App\Services;

use OpenAI\Client as OpenAIClient;

class ChatGptService
{
    protected OpenAIClient $client;

    public function __construct()
    {
        $this->client = OpenAIClient::factory([
            'api_key' => config('services.openai.api_key'),
        ]);
    }

    /**
     * Envoie le prompt à ChatGPT et retourne la réponse textuelle.
     *
     * @param string $prompt
     * @return string
     */
    public function ask(string $prompt): string
    {
        $response = $this->client->chat()->create([
            'model'    => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        // On renvoie la réponse du premier “choice”
        return $response['choices'][0]['message']['content'] ?? '';
    }
}
