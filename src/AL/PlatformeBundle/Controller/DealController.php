<?php

// src/AL/PlatformeBundle/Controller/DealController.php

namespace AL\PlatformeBundle\Controller;

use AL\PlatformeBundle\Entity\Deal;
use AL\PlatformeBundle\Entity\Backlink;
use AL\PlatformeBundle\Entity\Seller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AL\PlatformeBundle\Form\DealType;
use AL\PlatformeBundle\Form\BacklinkType;

class DealController extends Controller
{

    public function addAction(Request $request)
    {

        /** Dans ce controller, on créé nouvel objet deal : première étape avec seller, prix, date **/
        $deal = new Deal();
        $form = $this->createForm(DealType::class, $deal);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $deal = $form->getData();
            $em = $this->get('doctrine')->getManager();
            $em->persist($deal);
            $em->flush();
            return $this->redirectToRoute('add_backlink', array('id' => $deal->getId()));
        }
        return $this->render('default/AddDeal.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function backlinkAction($id, Request $request)
    {
        /** On créé nouvel objet backlink rattaché au deal **/

        $em = $this->get('doctrine')->getManager();
        $repository = $em->getRepository('ALPlatformeBundle:Deal');

        $deal = $repository->find($id);

        $backlink = new Backlink();
        $backlink->setDeal($deal);

        $form = $this->createForm(BacklinkType::class, $backlink);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $backlink = $form->getData();
            $em = $this->get('doctrine')->getManager();
            $em->persist($backlink);
            $em->flush();
            return $this->redirectToRoute('deal_success', array('id' => $deal->getId()));
        }
        return $this->render('default/Backlink.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function successAction($id)
    {
        /** Ici on affiche le deal et le backlink, on récupère l'id du deal **/

        $em = $this->get('doctrine')->getManager();
        $repository = $em->getRepository('ALPlatformeBundle:Deal');
        $deal = $repository->find($id);
        $seller = $deal->getSeller();
        return $this->render('default/success-deal.html.twig', array(
            'deal' => $deal,
            'seller' => $seller,
        ));
    }

    public function helloAction($slug)
    {
        $em = $this->get('doctrine')->getManager();

        $deal = new Deal();
        $deal->setSeller('testnomvendeur');
        $deal->setUrl('www.test.fr');
        $deal->setTarget('www.target.fr');
        $deal->setPrice('4');
        $em->persist($deal);
        $em->flush();
        return $this->render('default/hello.html.twig', array(
            'slug' => $slug
        ));

    }

    public function displayAction($id)
    {
        $em = $this->get('doctrine')->getManager();
        $repository = $em->getRepository('ALPlatformeBundle:Deal');
        $deal = $repository->find($id);
        return $this->render('default/display.html.twig', array(
            'deal' => $deal,
        ));


    }

}
