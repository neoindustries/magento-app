<?php


namespace SalesAndOrders\FeedTool\Test\Unit\Controller\Adminhtml\Oauth;

use PHPUnit\Framework\TestCase;
use \Magento\Framework\App\Action\Context;
use \SalesAndOrders\FeedTool\Model\Integration\Activation;
use SalesAndOrders\FeedTool\Controller\Adminhtml\Oauth\Activate;

/**
 * Comment is required here
 */
class ActivateTest extends TestCase
{
    protected $object;

    protected $context;

    protected $activation;

    protected $resultFactory;

    protected $resultFactoryMock;

    protected function setUp()
    {
        $this->context = $this->createMock(Context::class);
        $this->activation = $this->getMockBuilder(Activation::class)
            ->setMethods(['runActivation'])
            ->disableOriginalConstructor()
            ->getMock();
        $this->resultFactoryMock = $this->getMockBuilder(\Magento\Framework\Controller\ResultFactory::class)
            ->setMethods(['create', 'setData'])
            ->disableOriginalConstructor()
            ->getMock();

        $this->resultFactory = $this->context->expects($this->any())->method('getResultFactory')
            ->will($this->returnValue($this->resultFactoryMock));

        $this->object = $this->getMockBuilder(
            Activate::class
        )
            ->setMethods(
                [
                'getRequest'
                ]
            )
            ->setConstructorArgs(
                [
                    $this->context,
                    $this->activation
                ]
            )
            //->disableOriginalConstructor()
            ->getMock();
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    /**
     * @dataProvider dataProvider
     */
    public function testExecute($data)
    {
        $this->activation->expects($this->any())->method('runActivation')
            ->will($this->returnValue(true));
        $this->resultFactoryMock->expects($this->any())->method('create')->with('json')
            ->will($this->returnValue($this->resultFactoryMock));

        $this->resultFactoryMock->expects($this->any())->method('setData')->with($data)
            ->will($this->returnValue($data));

        $this->assertSame($this->resultFactoryMock, $this->object->execute());
    }

    public function dataProvider()
    {
        return [
            [
                ['status' => true, 'response' => true]
            ]
        ];
    }
}
