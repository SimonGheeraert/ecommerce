<?php

namespace Pizza\shopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Pizza\shopBundle\Entity\Product;
use Pizza\shopBundle\Model\Cart;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pizza\shopBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

/**
 * Cart controller.
 *
 * @Route("/cart")
 */

class CartController extends Controller
{
  /**
    *
    * @Route("/", name="cart")
    * @Method("GET")
    * @Template()
    */
  public function indexAction()
  {
    $cart = new Cart($this->container->get('request')->getSession());
    $repository = $this->getDoctrine()
      ->getRepository('PizzashopBundle:Product');
    $products = $repository->findAll();
    return $this->render('PizzashopBundle:Cart:index.html.twig', array(
      'products' => $products,
      'cart' => $cart->getCart()
    ));
  }


  /**
    *
    * @Route("/add/{id}", name="cart_add")
    * @Method("GET")
    * @Template()
    */
  public function addAction($id)
  {
    $cart = new Cart($this->container->get('request')->getSession());
    $cart->addItem($id);
    $repository = $this->getDoctrine()
      ->getRepository('PizzashopBundle:Product');
    $products = $repository->findAll();
    if ($this->container->get('request')->isXmlHttpRequest())
    {
      return $this->render('PizzashopBundle:Cart:cart.html.twig', array(
        'products' => $products,
        'cart' => $cart->getCart()
      ));
    }
    else
    {
      return $this->redirect($this->generateUrl('cart'));
    }
  }
  
  /**
    *
    * @Route("/order", name="cart_order")
    * @Method("GET")
    * @Template()
    */
  public function orderAction()
  {
   
    return $this->redirect($this->generateUrl('shop_register'));
    $orders = $session->get('cart');
      //, array(
      //'cart' => $cart->getCart()
      //));   
  }


  /**
    *
    * @Route("/remove/{id}", name="cart_remove")
    * @Method("GET")
    * @Template()
    */
  public function removeAction($id)
  {
    $cart = new Cart($this->container->get('request')->getSession());
    $cart->removeItem($id);
    if ($this->container->get('request')->isXmlHttpRequest())
    {
      return $this->render('PizzashopBundle:Cart:cart.html.twig', array(
        'products' => Product::findAll(),
        'cart' => $cart->getCart()
      ));
    }
    else
    {
      return $this->redirect($this->generateUrl('cart'));
    }
  }
}