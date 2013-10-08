<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // todo_rest_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'todo_rest_default_index')), array (  '_controller' => 'Todo\\Bundle\\RestBundle\\Controller\\DefaultController::indexAction',));
        }

        // todo_rest_items_getitems
        if (rtrim($pathinfo, '/') === '/items') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'todo_rest_items_getitems');
            }

            return array (  '_controller' => 'Todo\\Bundle\\RestBundle\\Controller\\ItemsController::getItemsAction',  '_route' => 'todo_rest_items_getitems',);
        }

        if (0 === strpos($pathinfo, '/todoLists')) {
            // todo_rest_todolists_createtodolist
            if ($pathinfo === '/todoLists/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_todo_rest_todolists_createtodolist;
                }

                return array (  '_controller' => 'Todo\\Bundle\\RestBundle\\Controller\\TodoListsController::createTodoListAction',  '_route' => 'todo_rest_todolists_createtodolist',);
            }
            not_todo_rest_todolists_createtodolist:

            // todo_rest_todolists_gettodolists
            if (rtrim($pathinfo, '/') === '/todoLists') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_todo_rest_todolists_gettodolists;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'todo_rest_todolists_gettodolists');
                }

                return array (  '_controller' => 'Todo\\Bundle\\RestBundle\\Controller\\TodoListsController::getTodoListsAction',  '_route' => 'todo_rest_todolists_gettodolists',);
            }
            not_todo_rest_todolists_gettodolists:

            // todo_rest_todolists_gettodolist
            if (preg_match('#^/todoLists/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_todo_rest_todolists_gettodolist;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'todo_rest_todolists_gettodolist')), array (  '_controller' => 'Todo\\Bundle\\RestBundle\\Controller\\TodoListsController::getTodoListAction',));
            }
            not_todo_rest_todolists_gettodolist:

            // todo_rest_todolists_updatetodolist
            if (preg_match('#^/todoLists/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_todo_rest_todolists_updatetodolist;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'todo_rest_todolists_updatetodolist')), array (  '_controller' => 'Todo\\Bundle\\RestBundle\\Controller\\TodoListsController::updateTodoListAction',));
            }
            not_todo_rest_todolists_updatetodolist:

            // todo_rest_todolists_deletetodolist
            if (preg_match('#^/todoLists/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_todo_rest_todolists_deletetodolist;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'todo_rest_todolists_deletetodolist')), array (  '_controller' => 'Todo\\Bundle\\RestBundle\\Controller\\TodoListsController::deleteTodoListAction',));
            }
            not_todo_rest_todolists_deletetodolist:

            // todo_rest_todolists_createitem
            if (preg_match('#^/todoLists/(?P<id>[^/]++)/items$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_todo_rest_todolists_createitem;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'todo_rest_todolists_createitem')), array (  '_controller' => 'Todo\\Bundle\\RestBundle\\Controller\\TodoListsController::createItemAction',));
            }
            not_todo_rest_todolists_createitem:

            // todo_rest_todolists_updateitem
            if (preg_match('#^/todoLists/(?P<id>[^/]++)/items/(?P<itemId>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_todo_rest_todolists_updateitem;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'todo_rest_todolists_updateitem')), array (  '_controller' => 'Todo\\Bundle\\RestBundle\\Controller\\TodoListsController::updateItemAction',));
            }
            not_todo_rest_todolists_updateitem:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
