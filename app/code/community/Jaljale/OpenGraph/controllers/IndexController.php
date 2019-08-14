<?php
class Jaljale_OpenGraph_IndexController extends Mage_Core_Controller_Front_Action{
    public function IndexAction() {
      
	  $this->loadLayout();   
	  $this->getLayout()->getBlock("head")->setTitle($this->__("Open Graph Tag"));
	        $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
      $breadcrumbs->addCrumb("home", array(
                "label" => $this->__("Home Page"),
                "title" => $this->__("Home Page"),
                "link"  => Mage::getBaseUrl()
		   ));

      $breadcrumbs->addCrumb("open graph tag", array(
                "label" => $this->__("Open Graph Tag"),
                "title" => $this->__("Open Graph Tag")
		   ));

      $this->renderLayout(); 
	  
    }
}