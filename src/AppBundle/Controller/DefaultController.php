<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use AppBundle\Controller\Persona;
use Symfony\Component\HttpFoundation\JsonResponse;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }
    
    /**
     * @Route("/serializar", name="serializer")
     */
     public function serializarAction(Request $request) {
        $serializer = $this->get('serializer');
        
        $person = new Persona();
        $person->setName('foo');
        $person->setAge(99);

        $jsonContent = $serializer->serialize($person, 'json');
        return $jsonContent;
//        return new JsonResponse($jsonContent,200);
     }
     
     /**
     * @Route("/deserializar", name="deserializer")
     */
     public function deserializarAction(Request $request) {
        $persona = $this->serializarAction($request);

        $serializer = $this->get('serializer')->deserialize($persona,'AppBundle\Controller\Persona','json');

        dump($serializer->getName(). ' ' . $serializer->getAge());
        die;
     }
}
