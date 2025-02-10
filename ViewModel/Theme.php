<?php
namespace BlueFinch\Build\ViewModel;

use \Magento\Framework\View\Element\Block\ArgumentInterface;
use \Magento\Framework\App\Config\ScopeConfigInterface;
use \Magento\Store\Model\StoreManagerInterface;

/**
 * Class GetStoreConfig
 * @package Gene\Framework\ViewModel
 */
class Theme implements ArgumentInterface
{

    /**
     * @var $scopeConfig
     */
    protected $scopeConfig;

    /**
     * @var $storeManager
     */
    protected $storeManager;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
    }

    /**
     * Get store config - pass through param 'section/group/field'
     * @param $config
     * @return mixed
     */
    public function getStoreConfig($config)
    {
        return $this->scopeConfig->getValue(
            $config,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        );
    }

    public function getMediaUrl($path)
    {
        return $this->storeManager
            ->getStore()
            ->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . $path;
    }
}
