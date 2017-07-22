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
        //    'deal' => array(
                'seller' => array(
                    'firstname' => 'Bidule',
                    'lastname' => 'Truc',
                    'company' => 'blabla',
                    'email' => 'Company@mail.fr',
                    'comment' => 'comment',
                ),
                'price' => '5',
                'date' => '40',
        //    )
        );

        $form = $this->factory->create(DealType::class);
        $deal = new Deal;
        $seller = new Seller;
        $seller->setFirstname('Bidule');
        $seller->setLastname('Truc');
        $seller->setCompany('blabla');
        $seller->setEmail('Company@mail.fr');
        $seller->setComment('comment');
        $deal->setSeller($seller);
        $deal->setPrice('5');
        $deal->setDate('40');

        // $deal = Deal::fromArray($formData);

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
