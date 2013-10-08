<?php

namespace Todo\Bundle\RestBundle\Controller;

use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Controller\FOSRestController;
use Todo\Bundle\CoreBundle\Entity as Entities;
use JMS\Serializer\SerializationContext;

/**
 * @Route("/todoLists")
 */
class TodoListsController extends RestController
{
    
    /**
     * 
     * @Route("/")
     * @Method({"POST"})
     */
    public function createTodoListAction()
    {
        $view = View::create();
        $serializer = $this->getSerializer();
        $todoList = $serializer->deserialize($this->getRequest()->getContent(),
                'Todo\Bundle\CoreBundle\Entity\TodoList',
                'json');
        $em = $this->getEm();
        $em->persist($todoList);
        $em->flush();
        $view->setStatusCode(201);
        $view->setData($todoList);
        return $view;
    }
    /**
     * 
     * @Route("/")
     * @Method({"GET"})
     */
    public function getTodoListsAction()
    {
        $view = View::create();
        $todoLists = $this->getDoctrine()->getRepository('TodoCoreBundle:TodoList')->findAll();
        $view->setData($todoLists);
        return $view;
    }
    
    /**
     * 
     * @Route("/{id}")
     * @Method({"GET"})
     */
    public function getTodoListAction($id)
    {
        $view = View::create();
        $todoList = $this->getDoctrine()->getRepository('TodoCoreBundle:TodoList')->find($id);
        if(!$todoList)
        {
            return $this->jsonErrorResponse(
                    "The todo list with an id of $id does not exist",
                    "Todo List not found",
                    404);
        }
        $view->setData($todoList);
        return $view;
    }
      
    /**
     * 
     * @Route("/{id}")
     * @Method({"PUT"})
     */    
    public function updateTodoListAction($id)
    {
        $view = View::create();
        $todoList = $this->getDoctrine()->getRepository('TodoCoreBundle:TodoList')->find($id);
        if(!$todoList)
        {
            return $this->jsonErrorResponse(
                    "The todo list with an id of $id does not exist",
                    "Todo List not found",
                    404);
        }
        $view->setData($todoList);       
    }
    
    /**
     * 
     * @Route("/{id}")
     * @Method({"DELETE"})
     */    
    public function deleteTodoListAction($id)
    {
        
    }
    
    /**
     * @Route("/{id}/items")
     * @Method({"POST"})
     */
    public function createItemAction($id)
    {
        $view = View::create();
        $todoList = $this->getDoctrine()->getRepository('TodoCoreBundle:TodoList')->find($id);
        if(!$todoList)
        {
            return $this->jsonErrorResponse(
                    "The todo list with an id of $id does not exist",
                    "Todo List not found",
                    404
            );
        }
        $item = $this->getSerializer()->deserialize(
                $this->getRequest()->getContent(),
                'Todo\Bundle\CoreBundle\Entity\Item',
                'json'
        );
        $item->setTodoList($todoList);
        $item->setPosition(0);
        $errors = $this->container->get('validator')->validate($item);
        if(isset($errors[0]))
        {
            return $this->jsonErrorResponse(
                $errors[0]->getMessage(),
                $errors[0]->getMessage(),
                400
            );
        }
        else
        {
            $this->getEm()->persist($item);
            $this->getEm()->flush();
            $view->setStatusCode(201);
            $view->setData($item);
        }
        return $view;
    }
    
    /**
     * @Route("/{id}/items/{itemId}")
     * @Method({"PUT"})
     */
    public function updateItemAction($id, $itemId)
    {
        $view = View::create();
        $todoList = $this->getDoctrine()->getRepository('TodoCoreBundle:TodoList')->find($id);
        if(!$todoList)
        {
            return $this->jsonErrorResponse(
                    "The todo list with an id of $id does not exist",
                    "Todo List not found",
                    404
            );
        }
        $item = $this->getSerializer()->deserialize(
                $this->getRequest()->getContent(),
                'Todo\Bundle\CoreBundle\Entity\Item',
                'json'
        );
        $item = $this->getEm()->merge($item);
        $item->setTodoList($todoList);
        $this->getEm()->persist($item);
        $this->getEm()->flush();
        $view->setStatusCode(200);
        $view->setData($item);
        return $view;
    }
}