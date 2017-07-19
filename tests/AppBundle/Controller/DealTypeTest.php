<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use AL\PlatformeBundle\Entity\Deal;
use AL\PlatformeBundle\Entity\Backlink;
use AL\PlatformeBundle\Entity\Seller;
use Symfony\Component\Form\Test\TypeTestCase;

use AL\PlatformeBundle\Form\DealType;
use AL\PlatformeBundle\Form\BacklinkType;
use AL\PlatformeBundle\Form\SellerType;
use AL\PlatformeBundle\Form\TargetType;

class DealTypeTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $formData = array(
            'deal[seller][firstname]' => 'Bidule',
            'deal[seller][lastname]'  => 'Truc',
            'deal[seller][company]'  => 'Company',
            'deal[seller][email]'  => 'Company@mail.fr',
            'deal[comment]'  => 'commentaire malin',
            'deal[price]'  => '6',
            'deal[date]'  => '10/09/1986',
        );

        $form = $this->factory->create(DealType::class);

        $deal = TestDeal::fromArray($formData);

        // submit the data to the form directly
        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());
        $this->assertEquals($deal, $form->getData());

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}
