<?php
namespace Pizza\shopBundle\Model;

class Cart
{
  protected $session;
  /**
   * Constructs the Cart instance
   *
   * @param Session $session 
   */
  public function __construct($session)
  {
    $this->session = $session;
  }

  public function addItem($id)
  {
    $cart = $this->getCart();
    if (!isset($cart[$id]))
    {
      $cart[$id] = 1;
    }
    else
    {
      ++$cart[$id];
    }
    $this->session->set('cart', $cart);
  }

  public function removeItem($id)
  {
    $cart = $this->getCart();
    if (isset($cart[$id]) && --$cart[$id] == 0)
    {
      unset($cart[$id]);
    }
    $this->session->set('cart', $cart);
  }
  
  public function getCart()
  {
    return $this->session->get('cart', array());
  }
}