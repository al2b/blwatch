<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    // public function testIndex()
    // {
    //     $client = static::createClient();
    //
    //     $crawler = $client->request('GET', '/');
    //
    //     $this->assertEquals(200, $client->getResponse()->getStatusCode());
    //     $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    // }

    public function testAddDeal()
    {
        $client = self::createClient();
        $url = $client->getContainer()->get('router')->generate('add_deal');
        $crawler = $client->request('GET', $url);
        $form = $crawler->selectButton('deal_save')->form();
        $client->submit($form, array(
            'deal[seller][firstname]' => 'Bidule',
            'deal[seller][lastname]'  => 'Truc',
            'deal[seller][company]'  => 'Company',
            'deal[seller][email]'  => 'Company@mail.fr',
            'deal[seller][comment]'  => 'commentaire malin',
            'deal[price]'  => '6',
            'deal[date]'  => '10/09/1986',
        ));
        $this->assertTrue($client->getResponse()->isRedirect());
        $this->assertEquals('AL\PlatformeBundle\Controller\DealController::addAction', $client->getRequest()->attributes->get('_controller'));
    }
}
