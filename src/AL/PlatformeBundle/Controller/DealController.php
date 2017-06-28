<?php

// src/AL/PlatformeBundle/Controller/DealController.php

namespace AL\PlatformeBundle\Controller;

use AL\PlatformeBundle\Entity\Deal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DealController extends Controller
{

    public function addAction(Request $request)
    {
        /** Je créé mon objet **/
        $deal = new Deal();

        /** Je créé formbuilder **/
        $formBuilder = $this->createFormBuilder($deal);

        /** Je rajoute les champs **/
        $formBuilder
            ->add('username', TextType::class)
            ->add('sellername', TextType::class)
        ;

        /** On génère le formulaire **/
        $form = $formBuilder->getForm();

        /** Afficher le template **/
        return $this->render('default/AddDeal.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function helloAction($slug)
    {
        $em = $this->get('doctrine')->getManager();

        $deal = new Deal();
        $deal->setUsername('testnom');
        $deal->setSellername('testnomvendeur');
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
