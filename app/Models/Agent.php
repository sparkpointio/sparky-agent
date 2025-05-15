<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    public function parsedBio() {
        return $this->bio ? json_decode($this->bio, true) : [];
    }

    public function parsedTopics() {
        return $this->topics ? json_decode($this->topics, true) : [];
    }

    public function parsedAdjectives() {
        return $this->adjectives ? json_decode($this->adjectives, true) : [];
    }

    public function parsedStyleAll() {
        return $this->style_all ? json_decode($this->style_all, true) : [];
    }

    public function parsedStyleChat() {
        return $this->style_chat ? json_decode($this->style_chat, true) : [];
    }

    public function parsedStylePost() {
        return $this->style_post ? json_decode($this->style_post, true) : [];
    }
}
