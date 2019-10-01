<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            
        ));
    }
    
    /**
     * @Route("/serializer/serializar", name="homepage")
     */
     public function serializarAction(Request $request) {
        $serializer = $this->get('serializer');
        dump($serializer);
        die;
     }
}
