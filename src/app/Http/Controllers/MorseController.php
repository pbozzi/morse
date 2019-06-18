<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MorseController extends Controller
{
    const MORSE = [
        "a" => ".-",
        "b" => "-...",
        "c" => "-.-.",
        "d" => "-..",
        "e" => ".",
        "f" => "..-.",
        "g" => "--.",
        "h" => "....",
        "i" => "..",
        "j" => ".---",
        "k" => "-.-",
        "l" => ".-..",
        "m" => "--",
        "n" => "-.",
        "o" => "---",
        "p" => ".--.",
        "q" => "--.-",
        "r" => ".-.",
        "s" => "...",
        "t" => "-",
        "u" => "..-",
        "v" => "...-",
        "w" => ".--",
        "x" => "-..-",
        "y" => "-.--",
        "z" => "--..",

        "0" => "-----",
        "1" => ".----",
        "2" => "..---",
        "3" => "...--",
        "4" => "....-",
        "5" => ".....",
        "6" => "-....",
        "7" => "--...",
        "8" => "---..",
        "9" => "----.",

        "." => ".-.-.-",
        "," => "--..--",
        "?" => "..--..",
        "'" => ".----.",
        "!" => "-.-.--",
        "/" => "-..-.",
        "(" => "-.--.",
        ")" => "-.--.-",
        "&" => ".-...",
        ":" => "---...",
        ";" => "-.-.-.",
        "=" => "-...-",
        "-" => "-....-",
        "_" => "..--.-",
        "\"" => ".-..-.",
        "$" => "...-..-",
        "@" => ".--.-.",

        "ç" => "-.-.."
    ];

    function isMorse($text) {
        $pattern = "/^[.-]{1,5}(?:[ \t]+[.-]{1,5})*(?:[ \t]+[.-]{1,5}(?:[ \t]+[.-]{1,5})*)*$/";
        return preg_match($pattern, $text);
    }

    public function convertMorseToText($morse) {
        // if (!$this->isMorse($morse))
        // {
        //     return $morse;
        // }

        $text = "";
        $words = explode("/", $morse);
        foreach($words as $key => $word)
        {
            $chars = explode(" ", $word);
            foreach($chars as $key => $char)
            {
                $letter = array_search($char, MorseController::MORSE);
                if ($letter != NULL) 
                {
                    $text .= $letter;
                } 
            }

            $text .= " ";
        }

        $text = trim($text);
        return $text;
    }

    public function convertMorseToTextJson(Request $request)
    {
        $data['morse'] = $request->morse;
        $data['text'] = $this->convertMorseToText($request->morse);
        return response()->json($data);
    }

    public function convertTextToMorse($text) {
        // if ($this->isMorse($text))
        // {
        //     return $text;
        // }
        
        $morse = "";
        $text = strtolower($text);
        $words = explode(" ", $text);
        foreach($words as $key => $word)
        {
            $chars = str_split($word);
            foreach($chars as $key => $char)
            {
                $morse .= MorseController::MORSE[$char] . " ";
            }

            $morse .= "/ ";
        }

        $morse = substr_replace($morse, "", -3);
        return $morse;
    }

    public function convertTextToMorseJson(Request $request) 
    {
        $data['text'] = $request->text;
        $data['morse'] = $this->convertTextToMorse($request->text);
        return response()->json($data);
    }
}