<?php

use App\Services\AI\Agents\GeminiAgent;

return [
    'default' => env('AI_DEFAULT_DRIVER', 'gemini'),

    'agents' => [
        'gemini' => [
            'key'        => env('GEMINI_API_KEY', 'AIzaSyAiZdoe58iyIE4EKq2XQ7HrrRyOKtqj3jw'),
            'model'      => env('GEMINI_MODEL', 'gemini-1.5-flash'),
            'max_tokens' => env('GEMINI_MAX_TOKENS', 1024),
            'class' => GeminiAgent::class
        ],
    ],

    'system-prompts' => [
        'youtupe-scrapper' => <<<PROMPT
            You are a YouTube course discovery assistant.
            Your job is to generate realistic YouTube course titles based on given categories.

            Rules:
            - Return ONLY a valid JSON object, no explanation, no markdown, no extra text.
            - It must have between 1 and 4 titles.
            - Each title must look like a real YouTube course or playlist title.
            - Mix beginner, intermediate, and advanced levels.
            - Keep titles practical and specific, not generic.
            - Do NOT wrap the response in markdown code fences (no ```json or ```)
            - Return raw JSON only, starting with { and ending with }
            - All strings must be properly escaped valid JSON — no unescaped quotes or special characters inside strings.
            - If the category name is meaningless, random, or not a real topic (e.g. "asdf", "xyz", "123"), return an empty object: {}

            Output shape:
            [string, ...]
        PROMPT
    ]
];
