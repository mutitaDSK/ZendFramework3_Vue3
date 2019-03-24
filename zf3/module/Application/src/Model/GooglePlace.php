<?php
/**
 * Call Google Place
 * Input: type as string, latitude as string, longitude as string
 * Output: array obj of place from google total 20 places
 * Process: Send GET Request To Google Place API
 */

namespace Application\Model;

use Zend\Http\Request;
use Zend\Http\Client;
use Zend\Http\Client\Adapter\Curl;

class GooglePlace
{
    public function findPlaces($type, $latitude, $longitude)
    {
        $googleKey = getenv('GOOGLE_KEY_ENV');
        $placeURL = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$latitude.','.$longitude.'&radius=1500&type='.$type.'&key='.$googleKey;

        $config = array(
            'adapter'      => 'Zend\Http\Client\Adapter\Socket',
            'ssltransport' => 'tls'
        );

        $request = new Request();
        $request->setUri($placeURL);

        $client = new Client();
        $adapter = new Curl();
        $adapter->setCurlOption(CURLOPT_SSL_VERIFYPEER, true);
        $client->setAdapter($adapter);

        $response = $client->send($request);
        if (!$response->isSuccess()) {
            throw new Exception\RuntimeException("Invalid response received from google place.\n" . $response->getContent());
        }

        $data = $response->getBody();
        $dataArray = json_decode($data);

        return $dataArray->results;
    }
}