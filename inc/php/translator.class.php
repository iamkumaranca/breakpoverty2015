<?php
class Traslator_API {

    private $input;
    private $output;
    private $apiKey = 'AIzaSyDut9WBsnq9LG468KHnCpUO8w2xZRFoWfg';

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
        //'https://www.googleapis.com/language/translate/v2/detect?q=hello&key=' . $this->apiKey;
        $languageDetect = 'https://www.googleapis.com/language/translate/v2/detect?q=hello&key=AIzaSyDut9WBsnq9LG468KHnCpUO8w2xZRFoWfg';
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
