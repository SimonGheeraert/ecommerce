<?php

namespace Pizza\shopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pizza\shopBundle\Entity\User;
use Pizza\shopBundle\Model\Cart;


/**
 * User controller.
 *
 * @Route("/order")
 */
class OrderController extends Controller
{

    /**
     *
     * @Route("/", name="orders")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
    	$cart = new Cart($this->container->get('request')->getSession());
		$object_user= $this->get('security.context')->getToken()->getUser();
		$object_user->getUsername();
		return $this->render('PizzashopBundle:Order:index.html.twig', array(
			'user_object' 	=> $object_user,
			'cart'			=> $cart->getCart(),
			));
    	//displays the current user
    		// requires a registration
    		// after registration, a redirect is thus executed towards /order
    	//displays the ordered items, that are stored in the session
    	//redirect to /order/execute


    }

    /**
     *
     * @Route("/execute", name="orders_executed")
     * @Method("GET")
     * @Template()
     */
    public function storeAction()
    {
    	//push the order in the database, more specifically in SoldProducts
    }

}