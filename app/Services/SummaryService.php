<?php

namespace App\Services;

use App\Interfaces\SummaryInterface;
use App\Helpers\OpenAIHelper;

class SummaryService implements SummaryInterface
{       

    public function summaryText(string $text)
    {
        $Response = array('result' => '', 'error' => '');
        // creating connection
        $openAIClient = OpenAIHelper::create_openAI_connection();
        if ($openAIClient) {
            // validating text 
            if (!OpenAIHelper::validate_text($text, $openAIClient)) {
                $summary_prompt = "\n\Write an engaging summary for the above article in less than 120 characters:\n\n";
                $result =  OpenAIHelper::complete(
                    $prompt = $text . $summary_prompt,
                    $model = 'gpt-3.5-turbo',
                    $temperature = 0.9,
                    $maxTokens = 50,
                    $openAIClient
                );
                 // Process the summary as needed
                $result = str_replace("\n", " ", $result);
                $result = str_replace('"', '', $result);
                $Response['result'] = $result;
            } else {
                $Response['error'] = 'Cannot generate response for this text';
            }
        } else {
            $Response['error'] = 'something went wrong , try again later';
        }
        return $Response;
    }
}
