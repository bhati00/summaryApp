<?php

namespace App\Helpers;

use OpenAI\Client as OpenAIClient;
use OpenAI;
use Exception;

final class OpenAIHelper
{
    public static function create_openAI_connection(): OpenAIClient
    {
        try {
            $openAIClient = OpenAI::client(env('OPEN_AI_API_KEY'));
            return $openAIClient;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function validate_text(string $text, OpenAIClient $openAIClient)
    {
        try {
            $response = $openAIClient->moderations()->create([
                'model' => 'text-moderation-latest',
                'input' => $text,
            ]);
            return $response["results"][0]["flagged"];
        } catch (Exception $e) {
            return true;
        }
    }

    public static function complete(
        string $prompt,
        string $model = "text-davinci-003",
        float $temperature = 0.9,
        int $maxTokens = 50,
        OpenAIClient $openAIClient
    ): string {
        try {
            if (strpos($model, 'text') !== false) {
                $response = $openAIClient->completions([
                    'prompt' => $prompt,
                    'model' => $model,
                    'temperature' => $temperature,
                    'max_tokens' => $maxTokens,
                ]);
                return $response['choices'][0]['text'];
            } else {
                $response = $openAIClient->chat()->create([
                    'model' => $model,
                    'messages' => [['role' => 'user', 'content' => $prompt]],
                    'temperature' => $temperature,
                    'max_tokens' => $maxTokens,
                ]);
                return $response['choices'][0]['message']['content'];
            }
        } catch (Exception $e) {
            return "OpenAI API error: " . $e->getMessage();
        }
    }

    public static function audio_transcribe($resource, OpenAIClient $openAIClient)
    {
        try {
            $response = $openAIClient->audio()->transcribe([
                'file' => $resource,
                'model' => "whisper-1",
                'response_format' => "srt",
                'language' => "en"
            ]);
            $as = $response->task; // 'transcribe'
            $r = $response->language; // 'english'
           $t = $response->duration; // 2.95
            $w = $response->text;
            return $response->text;
        } catch (Exception $e) {
            return "OpenAI API error: " . $e->getMessage();
        }
    }
}
