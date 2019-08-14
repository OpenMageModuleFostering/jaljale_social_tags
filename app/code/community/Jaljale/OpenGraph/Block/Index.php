<?php   
class Jaljale_OpenGraph_Block_Index extends Mage_Core_Block_Template{   

	public static $_store = '';

    protected function _getStore()
    {
        if(self::$_store){
            self::$_store = Mage::app()->getStore()->getStoreId();
        }

        return self::$_store;
    }
    public function getType()
    {
        if(Mage::registry('current_product'))
        {
            return "Product";
        }
        elseif(Mage::registry('current_category'))
        {
            return "Product Category";
        }
        else
        {
            return "Website";
        }
    }
    public function getImage()
    {
        if(Mage::registry('current_product'))
        {
            return $this->helper('catalog/image')->init(Mage::registry('current_product'), 'small_image');
        }
        elseif(Mage::registry('current_category') && Mage::getModel('catalog/layer')->getCurrentCategory()->getThumbnail())
        {
            $categoryImage = Mage::getModel('catalog/layer')->getCurrentCategory()->getThumbnail(); 
            return Mage::getBaseUrl('media')."catalog/category/".$categoryImage;
        }
        else
        {

            return Mage::getBaseUrl('media') . "jaljale/" . Mage::getStoreConfig('opengraph/common/image', $this->_getStore());
        }
    }

    public function getFbId()
    {
    	return Mage::getStoreConfig('opengraph/facebook/appcode', $this->_getStore());
    }

	public function getTitle()
    {
        return Mage::app()->getLayout()->getBlock('head')->getTitle();
    }

    public function getSiteName()
    {
        return Mage::getStoreConfig('system/website/name');
    }

    public function getDescription()
    {
        return  htmlspecialchars($this->getLayout()->getBlock('head')->getDescription());
    }

    public function getContent()
    {
    	return $this->helper('core/url')->getCurrentUrl();
    }

    public function getLocale()
    {
    	return Mage::getStoreConfig('general/locale/code', $this->_getStore());
    }
    public function getFbEnable()
    {
        return Mage::getStoreConfig('opengraph/facebook/enable', $this->_getStore());
    }
    public function getTwitterEnable()
    {
        return Mage::getStoreConfig('opengraph/twitter/enable', $this->_getStore());
    }




}