<?php

namespace Todo\Bundle\RestBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;

abstract class RestController extends FOSRestController
{
    protected function jsonErrorResponse($developerMessage, $userMessage, $httpStatusCode)
    {
        $response = new Response(json_encode(array(
            'developer_message' => $developerMessage,
            'user_message' => $userMessage,
        )), $httpStatusCode);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }
    
    protected function getSerializer()
    {
        return $this->container->get('jms_serializer');
    }
    
    protected function getEm()
    {
        return $this->getDoctrine()->getEntityManager();
    }
}