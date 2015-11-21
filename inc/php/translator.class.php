<?php
class Traslator_API {

    private $input;
    private $output;
    private $apiKey = 'AIzaSyChfy5ao_OoY9962aJOou2nA2OF5YNAEM8';

    function __construct( $input ) {
		$this->input = $input;
        $this->translateInput();
	}

    static function setOutput( $output ) {
        $this->output = $output;
    }

    function getOutput() {
        //echo $this->output;
        //echo 'hello';
    }

    function translateInput() {
        $languageDetect = 'https://www.googleapis.com/language/translate/v2/detect?q=' . rawurlencode($this->input) . '&key=' . $this->apiKey;
        $handle = curl_init($languageDetect);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handle);
        $responseDecoded = json_decode($response, true);
        curl_close($handle);

        echo '<pre>';
        print_r(json_decode($response, true));
        echo '</pre>';

        echo $languageDetect;
        //echo 'Source: ' . $this->input . '<br>';
        //echo 'Language: ' . $responseDecoded['data']['data'][0][0]['language'];

    }

 }

?>
