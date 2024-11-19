<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function getFirstTwoSentences() {
        $text = file_get_contents($this->body);

        $text = strip_tags($text);

        // Find the position of the first period, question mark, or exclamation point followed by a space
        $firstEndPosition = preg_match('/[.?!]\s/', $text, $matches, PREG_OFFSET_CAPTURE);

        // If the first end punctuation exists, find the position of the second end punctuation after the first one
        if ($firstEndPosition) {
            $secondEndPosition = preg_match('/[.?!]\s/', $text, $matches, PREG_OFFSET_CAPTURE, $matches[0][1] + 1);
            if ($secondEndPosition) {
                return substr($text, 0, $matches[0][1] + 1);
            }
        }

        // If there's no second end punctuation, return the original text
        return $text;
    }
}
