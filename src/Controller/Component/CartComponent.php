<?php
namespace App\Controller\Component;

use Cake\Controller\Component;

class CartComponent extends Component
{
    public function initialize(array $config) 
    {
        parent::initialize($config);
    }


     /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add_product($data)
    {   
		
        $cartItems = $this->request->getSession()->read('Cart.Products');
        // $this->request->session()->destroy();
        // pr($this->request->session()->read('Cart.Products')); die;
        // pr( $data); die;

        if(empty($cartItems)) {
           $arrStore = array($data['product_id']."_".$data['size_id'] => $data);
           // pr($arrStore); die;
           $this->request->getSession()->write('Cart.Products', $arrStore);
        }else{
            if (array_key_exists($data['product_id']."_".$data['size_id'], $cartItems)) {
                
                unset($cartItems[$data['product_id']."_".$data['size_id']]);
                $cartItems[$data['product_id']."_".$data['size_id']] = $data;
                
                $this->request->getSession()->write('Cart.Products', $cartItems);
            } else { 
                $cartItems[$data['product_id']."_".$data['size_id']] = $data;
                
                $this->request->getSession()->write('Cart.Products', $cartItems);
            }
        }
    }


	
	 /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
   public function remove_item($data)
    {  
        $cartItems = $this->request->getSession()->read('Cart');
        if(!empty($cartItems)) {
            unset($cartItems['Products'][$data['product_id']]);
            $this->request->getSession()->write('Cart', $cartItems);
        }
        return true;
    }

    public function get_whole_cart()
    {   
        $cartItems = $this->request->getSession()->read('Cart');

        // pr($cartItems);
        if(!empty($cartItems)) {
            return $cartItems;
        }
    }

}
