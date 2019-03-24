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
 */

namespace ApplicationTest\Controller;

use Application\Controller\TestController;
use Zend\Stdlib\ArrayUtils;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class FindValueOfPositionTestControllerTest extends AbstractHttpControllerTestCase
{
    public function setUp()
    {
        // The module configuration should still be applicable for tests.
        // You can override configuration here with test case specific values,
        // such as sample view templates, path stacks, module_listener_options,
        // etc.
        $configOverrides = [];

        $this->setApplicationConfig(ArrayUtils::merge(
            include __DIR__ . '/../../../../config/application.config.php',
            $configOverrides
        ));

        parent::setUp();
    }

    public function testFindValueOfPositionActionCanBeAccessed()
    {
        $this->dispatch('/value/1', 'GET');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('application');
        $this->assertControllerName(TestController::class);
        $this->assertControllerClass('TestController');
        $this->assertMatchedRouteName('findValueOfPosition');
    }

    public function testFindValueOfPositionActionEmptyPositionReturn404()
    {
        $this->dispatch('/value/', 'GET');
        $this->assertResponseStatusCode(404);
    }
}