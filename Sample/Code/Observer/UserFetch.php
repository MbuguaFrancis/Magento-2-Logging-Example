<?php


namespace Sample\Code\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;


class UserFetch implements ObserverInterface
{


    protected $adminLogin;

   public function __construct(\Magento\Logging\Observer\AdminLogin $adminLogin)
    {
        $this->adminLogin = $adminLogin;
    }

    public function execute( Observer $observer)
    {

       //$this->adminLogin->logAdminLogin($observer->getUser()->getUsername(), $observer->getUser()->getId()); 
        $data = $observer->getUser()->getUsername().''. $observer->getUser()->getId();
        $writer = new \Zend\Log\Writer\Stream(BP . '/var/log/UserFetch.log');
        $logger = new \Zend\Log\Logger();
        $logger->addWriter($writer);
        $logger->info($data);
        
    }
}
