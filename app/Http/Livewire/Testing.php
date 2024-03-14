<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Illuminate\Support\Facades\Http;


class Testing extends Component
{

    public $code_script = '';
    public $language = '';


    public function render()
    {
        return view('livewire.testing')->layout('layouts.app');
    }


    public function save()
    {

        $body = [
            "contents" => [
                [
                    "parts" => [
                        [
                            "text" => "Analyse the followwing $this->language code and return only 'yes' if the code valid or 'no' if not valid $this->code_script"
                        ]
                    ]
                ]
            ]
        ];

        $reply = "";

        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=AIzaSyDDxavNQhZSeyc1eFbzRPGOICCNXJrqxG0";

        $response = Http::post("$url", $body);

        if ($response->ok()) {

            $response = $response->json();

            $reply = $response['candidates'][0]['content']['parts'][0]['text'];
        }

        Log::info("This is my reply");
        Log::info($reply);
        if ($reply == "yes") {
            session()->flash('message', 'The Programming codes passed successfully');

            // return redirect()->to('/testing');
        } else {
            session()->flash('error', 'Failed to verify code validity');
        }

        // return redirect()->to('/')->with("Script added successfully");
    }
}
