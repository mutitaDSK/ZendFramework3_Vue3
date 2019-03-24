<?php
/**
 * Test Controller with Find value of position function.
 * Input: position as string
 * Output: JSON object as
 * {
 *  position: 1,
 *  value: 3
 * }
 * Process:
 * 1. Call ValueOfPosition Model To Find Value From Position
 * 2. Return Result as Json
 * */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Application\Model\ValueOfPosition;
use Application\Model\GooglePlace;
use Zend\Http\Response;
use Zend\Cache\PatternFactory;
use Zend\Cache\StorageFactory;

class TestController extends AbstractActionController
{
    private $cacheConfig = [
        'adapter' => [
            'name'    => 'filesystem',
            'options' => ['ttl' => 3600],
        ],
        'plugins' => [
            'exception_handler' => ['throw_exceptions' => false],
        ],
    ];

    public function findValueOfPositionAction()
    {
        $cache = StorageFactory::factory($this->cacheConfig);

        $position = (int) $this->params()->fromRoute('position');

        $classCache = PatternFactory::factory('class', [
            'class'   => 'Application\Model\ValueOfPosition',
            'storage' => 'filesystem',
        ]);

        $key    = $classCache->generateKey('find', array($position));
        $valueOfPosition = (int) $cache->getItem($key, $success);

        if (! $success) {
            $value = new ValueOfPosition();
            $valueOfPosition = $value->find($position);
            $cache->setItem($key, $valueOfPosition);
        }

        $result = new JsonModel([
            'position' => $position,
            'value'=> $valueOfPosition,
        ]);

        return $result;
    }

    public function findAllRestaurantsInBangSueAction()
    {
        $cache = StorageFactory::factory($this->cacheConfig);

        $classCache = PatternFactory::factory('class', [
            'class'   => 'Application\Model\GooglePlace',
            'storage' => 'filesystem',
        ]);

        $key    = $classCache->generateKey('findPlaces', array('restaurant', '13.809722', '100.537222'));
        $jsonPlaces = $cache->getItem($key, $success);

        if (! $success) {
            $googlePlace = new GooglePlace();

            try {
                $places = $googlePlace->findPlaces('restaurant', '13.809722', '100.537222');
            } catch (Zend_Exception $e) {
                $response = new Response();
                $response->setStatusCode(Response::STATUS_CODE_401);
                $response->setContent(new JsonModel([
                    'type' => 'restaurant',
                    'code' => 'Bang Sue',
                    'message'=> $e->getMessage(),
                ]));
                return $response;
            }

            $jsonPlaces = json_encode($places);
            $cache->setItem($key, $jsonPlaces);
        }

        $places = json_decode($jsonPlaces);

        $result = [
            'type' => 'restaurant',
            'location' => 'Bang Sue',
            'results'=> $places,
        ];

        $response = new Response();
        $response->setStatusCode(Response::STATUS_CODE_200);
        $response->getHeaders()->addHeaders(array(
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, POST',
            'Content-Type' => 'application/json',
            'Access-Control-Allow-Headers' => '*',
        ));
        $response->setContent(json_encode($result));
        return $response;
    }
}