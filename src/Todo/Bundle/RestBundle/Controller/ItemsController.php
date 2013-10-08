<?php

namespace Todo\Bundle\RestBundle\Controller;

use FOS\RestBundle\View\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Controller\FOSRestController;
use Todo\Bundle\CoreBundle\Entity as Entities;
use JMS\Serializer\SerializationContext;
/**
 * @Route("/items")
 */
class ItemsController extends FOSRestController
{
    /**
     * 
     * @Route("/")
     */
    public function getItemsAction()
    {
        $view = View::create();
        //$view->setFormat('json');
        $todoList = $this->getDoctrine()->getRepository('TodoCoreBundle:Item')->find(1);
        /*$serializer = $this->container->get('jms_serializer');
        $serializer->setGroups(array('list'));
        $serialized = $serializer->serialize($item, 'json');
        die(print_r($serialized));*/
        /*die(print_r($serializer->deserialize($serialized, 'Todo\Bundle\CoreBundle\Entity\Item', 'json')));
        die(print_r($item));*/
        $data = array($todoList);
        $view->setData($data);
        $view->setTemplateVar('items');
        return $view;
    }
}