<?php
class Traslator_API {

    private $input;
    private $output;
    private $apiKey = 'AIzaSyAww6xe_uCN25DTo84zsMyXlFsLGwkopZc';

    function __construct( $input ) {
		$this->input = $input;
	}

    static function setOutput( $output ) {
        $this->output = $output;
    }

    function translateInput() {
        $url = 'https://www.googleapis.com/language/translate/v2/detect?q=' . $this->input .'&key=' . $this->apiKey;
        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handle);
        $responseDecoded = json_decode($response, true);
        curl_close($handle);
        //echo '<pre>';
        //print_r(json_decode($response, true));
        //echo '</pre>';
        $detectedLanuage = $responseDecoded['data']['detections'][0][0]['language'];

        if ( $detectedLanuage == 'en' ) :
            $url = 'https://www.googleapis.com/language/translate/v2?q=' . $this->input .'&target=sw&key=' . $this->apiKey;
            $handle = curl_init($url);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($handle);
            $responseDecoded = json_decode($response, true);
            curl_close($handle);
            //echo '<pre>';
            //print_r(json_decode($response, true));
            //echo '</pre>';
            $translatedString = $responseDecoded['data']['translations'][0]['translatedText'];
            //echo $translatedString;
        else :
            $url = 'https://www.googleapis.com/language/translate/v2?q=' . $this->input .'&target=en&key=' . $this->apiKey;
            $handle = curl_init($url);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($handle);
            $responseDecoded = json_decode($response, true);
            curl_close($handle);
            //echo '<pre>';
            //print_r(json_decode($response, true));
            //echo '</pre>';
            $translatedString = $responseDecoded['data']['translations'][0]['translatedText'];
            //echo $translatedString;
        endif;
        return $translatedString;
    }

 }

?>
