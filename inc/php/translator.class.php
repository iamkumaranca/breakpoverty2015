<?php

class Traslator_API {

    private $input;
    private $output = 'hello';

    function __construct( $input ) {
		$this->input = $input;
	}

    function setOutput() {
        $this->output = $this->input;
    }

    function getOutput() {
        return $this->output;
    }

    // function translateInput() {
    //     echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>';
    //
    //     echo '<script>
    //     $.ajax({
    //         url: \'https://www.googleapis.com/language/translate/v2/detect?q=' . $this->input . '&key=AIzaSyChfy5ao_OoY9962aJOou2nA2OF5YNAEM8\',
    //         dataType: \'json\',
    //         type: \'GET\',
    //         success: function(data) {
    //             //console.log(data.data.detections[0][0].language);
    //             console.log(data);
    //             translate_string(data);
    //         },
    //         error: function(data){
    //             console.log(data);
    //         }
    //     });
    //
    //     function translate_string(detected_language) {
    //         var language = detected_language.data.detections[0][0].language;
    //
    //         if ("en" == language) {
    //             $.ajax({
    //                 url: \'https://www.googleapis.com/language/translate/v2?key=AIzaSyChfy5ao_OoY9962aJOou2nA2OF5YNAEM8&q=' . $this->input . '&source=en&target=sw\',
    //                 dataType: \'json\',
    //                 type: \'GET\',
    //                 success: function(data) {
    //                     send_translation(data);
    //                 },
    //                 error: function(data){
    //                     console.log(data);
    //                 }
    //             });
    //         } else {
    //             $.ajax({
    //                 url: \'https://www.googleapis.com/language/translate/v2?q=' . $this->input . '&target=en&key=AIzaSyChfy5ao_OoY9962aJOou2nA2OF5YNAEM8\',
    //                 dataType: \'json\',
    //                 type: \'GET\',
    //                 success: function(data) {
    //                     send_translation(data);
    //                 },
    //                 error: function(data){
    //                     console.log(data);
    //                 }
    //             });
    //         }
    //     }
    //
    //     function send_translation(translated_word) {
    //         var $translation = translated_word.data.translation[0][0].translatedText;
    //     }';
    // }

 }

?>
