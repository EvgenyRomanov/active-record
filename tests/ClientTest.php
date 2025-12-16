<?php

declare(strict_types=1);

namespace Tests;

use App\Client;
use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class ClientTest extends TestCase
{
    public function testClient(): void
    {
        $client = new Client();
        $client->setEmail('test@mail.ru');
        $client->setFirstName('Test1');
        $client->setMiddleName('Test2');
        $client->setLastName('Test3');
        $client->save();

        self::assertNotNull(Client::getById($client->getId()));

        // --
        $newMiddleName = "TEST456";
        $client->setMiddleName($newMiddleName);
        $client->save();

        self::assertEquals($newMiddleName, Client::getById($client->getId())->getMiddleName());

        // --
        self::assertNotEmpty(Client::findAll());

        // --
        $client->delete();
        self::assertNull($client->getId());
    }
}
