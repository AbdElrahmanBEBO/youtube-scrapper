<?php

namespace App\Services\AI;

use App\Contracts\AIServiceInterface;

class AIService
{

    private function agent(?string $name = null): AIServiceInterface
    {
        $name   = $name ?? config('ai.default');

        $agent = config("ai.agents.{$name}");

        $systemPrompt = config("ai.system-prompts.youtupe-scrapper");

        if (!$agent) {
            throw new \InvalidArgumentException("AI Agent [{$name}] is not configured.");
        }

        $class = $agent['class'];

        return new $class($agent, $systemPrompt);
    }

    public function getCategoriesGroupedTitles(string $category)
    {
        $userPrompt = <<<PROMPT
            Generate YouTube course titles for ALL of these category: {$category}
        PROMPT;

        return json_decode($this->agent('gemini')->ask($userPrompt));
    }
}
