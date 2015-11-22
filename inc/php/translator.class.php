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
        $responseCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        curl_close($handle);
        $detectedLanuage = $responseDecoded['data']['detections'][0][0]['language'];
        if($responseCode != 200) :
            $errorCode = 'Fetching translation failed! Server response code:' . $responseCode . '<br>';
            $errorDescription = 'Error description: ' . $responseDecoded['error']['errors'][0]['message'];
            return $errorCode . ' ' .  $errorDescription;
        else :
            if ( $detectedLanuage == 'en' ) :
                $url = 'https://www.googleapis.com/language/translate/v2?q=' . $this->input .'&target=sw&key=' . $this->apiKey;
                /*$handle = curl_init($url);
                curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($handle);
                $responseDecoded = json_decode($response, true);
                $responseCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                curl_close($handle);
                $translatedString = $responseDecoded['data']['translations'][0]['translatedText'];
                if($responseCode != 200) :
                    $errorCode = 'Fetching translation failed! Server response code:' . $responseCode . '<br>';
                    $errorDescription = 'Error description: ' . $responseDecoded['error']['errors'][0]['message'];
                    return $errorCode . ' ' .  $errorDescription;
                else :
                    return  rawurldecode($this->input) . ' -> ' . $translatedString;
                endif;*/
                $this->googleAPICall($url);
            else:
                /*$url = 'https://www.googleapis.com/language/translate/v2?q=' . $this->input .'&target=en&key=' . $this->apiKey;
                $handle = curl_init($url);
                curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($handle);
                $responseDecoded = json_decode($response, true);
                $responseCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                curl_close($handle);
                $translatedString = $responseDecoded['data']['translations'][0]['translatedText'];
                if($responseCode != 200) :
                    $errorCode = 'Fetching translation failed! Server response code:' . $responseCode . '<br>';
                    $errorDescription = 'Error description: ' . $responseDecoded['error']['errors'][0]['message'];
                    return $errorCode . ' ' .  $errorDescription;
                else :
                    return  rawurldecode($this->input) . ' -> ' . $translatedString;
                endif;*/
                $url = 'https://www.googleapis.com/language/translate/v2?q=' . $this->input .'&target=en&key=' . $this->apiKey;
                $this->googleAPICall($url);
            endif;
        endif;
    }

    function googleAPICall( $url ) {
        //$url = 'https://www.googleapis.com/language/translate/v2?q=' . $this->input .'&target=en&key=' . $this->apiKey;
        $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handle);
        $responseDecoded = json_decode($response, true);
        $responseCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        curl_close($handle);
        $translatedString = $responseDecoded['data']['translations'][0]['translatedText'];
        if($responseCode != 200) :
            $errorCode = 'Fetching translation failed! Server response code:' . $responseCode . '<br>';
            $errorDescription = 'Error description: ' . $responseDecoded['error']['errors'][0]['message'];
            return $errorCode . ' ' .  $errorDescription;
        else :
            return  rawurldecode($this->input) . ' -> ' . $translatedString;
        endif;
    }
 }

?>
