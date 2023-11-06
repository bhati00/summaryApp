<?php

namespace App\Services;

use App\Helpers\OpenAIHelper;
use Exception;
use App\Interfaces\SpeechToTextInterface;

class SpeechToTextService implements SpeechToTextInterface
{

    public function speech_to_text_with_openAI($resource)
    {
        $Response = array('result' => '', 'error' => '');
        // creating connection
        $openAIClient = OpenAIHelper::create_openAI_connection();
        if ($openAIClient) {
            try {
                $transcription = OpenAIHelper::audio_transcribe($resource, $openAIClient);
                $Response['result'] = $transcription;
            } catch (Exception $e) {
                $Response['error'] = $e->getMessage();
            }
        } else {
            $Response['error'] = 'something went wrong , try again later';
        }
        return $Response;
    }
}
