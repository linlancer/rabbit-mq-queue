<?php
/**
 * Created by PhpStorm.
 * User: $_s
 * Date: 2020/6/15
 * Time: 16:13
 */

namespace LinLancer\Laravel\RabbitMQ\Tests;

use Enqueue\AmqpLib\AmqpConnectionFactory;
use Illuminate\Contracts\Events\Dispatcher;
use LinLancer\Laravel\RabbitMQ\Queue\Connectors\RabbitMQConnector;
use LinLancer\Laravel\RabbitMQ\Queue\RabbitMQQueue;
use PHPUnit\Framework\TestCase;

class RabbitMQConnectorTest extends TestCase
{

    public function testConnect()
    {
        $connector = new RabbitMQConnector($this->createMock(Dispatcher::class));

        $config = $this->getConfig();
        $config['factory_class'] = AmqpConnectionFactory::class;

        $queue = $connector->connect($config);

        $this->assertInstanceOf(RabbitMQQueue::class, $queue);
    }

    /**
     * @return array
     */
    private function getConfig()
    {
        return [
            'dsn' => '',
            'host' => '192.168.67.124',
            'port' => '5672',
            'login' => 'gzf',
            'password' => 'gzf123',
            'vhost' => '/',
        ];
    }
}
