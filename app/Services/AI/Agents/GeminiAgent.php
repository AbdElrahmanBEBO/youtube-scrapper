<?php

namespace App\Services\AI\Agents;

use App\Contracts\AIServiceInterface;
use Illuminate\Support\Facades\Http;

class GeminiAgent implements AIServiceInterface
{
    private string $apiKey;
    private string $model;
    private int    $maxTokens;
    private string $systemPrompt;
    private string $baseUrl = 'https://generativelanguage.googleapis.com/v1beta/models';

    public function __construct(array $config, $systemPrompt)
    {
        $this->apiKey       = $config['key'];
        $this->model        = $config['model'];
        $this->maxTokens    = $config['max_tokens'];
        $this->systemPrompt = $systemPrompt;
    }

    public function ask(string $prompt): string
    {
        $body = [
            'contents' => [
                ['role' => 'user', 'parts' => [['text' => $prompt]]],
            ],
            'generationConfig' => [
                'maxOutputTokens' => $this->maxTokens,
            ],
        ];

        if ($this->systemPrompt !== '') {
            $body['systemInstruction'] = [
                'parts' => [['text' => $this->systemPrompt]],
            ];
        }

        $url = "{$this->baseUrl}/{$this->model}:generateContent?key={$this->apiKey}";

        $response = Http::withOptions(['verify' => false])->withHeaders(['Content-Type' => 'application/json'])->post($url, $body);

        if ($response->failed()) {
            throw new \RuntimeException('Gemini request failed: ' . $response->body());
        }

        return $response->json('candidates.0.content.parts.0.text');
    }
}
