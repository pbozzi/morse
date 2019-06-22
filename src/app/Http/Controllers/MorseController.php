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
        "@" => ".--.-."
    ];

    function isMorse($input) {
        $pattern = "/[a-zA-Z0-9,?'!()&:;=_\"$@]+/";
        return !preg_match($pattern, $input);
    }

    function retirarAcentos($string) {
        return preg_replace(
            array("/(á|à|ã|â|ä)/"
                ,"/(Á|À|Ã|Â|Ä)/"
                ,"/(é|è|ê|ë)/"
                ,"/(É|È|Ê|Ë)/"
                ,"/(í|ì|î|ï)/"
                ,"/(Í|Ì|Î|Ï)/"
                ,"/(ó|ò|õ|ô|ö)/"
                ,"/(Ó|Ò|Õ|Ô|Ö)/"
                ,"/(ú|ù|û|ü)/"
                ,"/(Ú|Ù|Û|Ü)/"
                ,"/(ñ)/"
                ,"/(Ñ)/"
                ,"/(ç)/"
                ,"/(Ç)/")
            , explode(" ","a A e E i I o O u U n N c C")
            , $string);
    }

    public function convert(Request $request) {
        $input = $request->input;
        $input = $this->retirarAcentos($input);
        return $this->isMorse($input) ? $this->convertMorseToText($input) : $this->convertTextToMorse($input);
    }

    public function convertMorseToText($input) {
        if (strlen(trim($input)) <= 0) {
            return $input;
        }

        $text = "";
        $words = explode("/", $input);
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

        $data['input'] = $input;
        $data['output'] = $text;
        return response()->json($data);
    }

    public function convertTextToMorse($input) {
        if (strlen(trim($input)) <= 0) {
            return $input;
        }

        $morse = "";
        $input = strtolower($input);
        $words = explode(" ", $input);
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
        
        $data['input'] = $input;
        $data['output'] = $morse;
        return response()->json($data);
    }
}