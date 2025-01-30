<?php
namespace BlueFinch\Build\ViewModel;

use \Magento\Framework\View\Element\Block\ArgumentInterface;
use \Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class GetStoreConfig
 * @package Gene\Framework\ViewModel
 */
class Theme implements ArgumentInterface
{

    /**
     * @var Image
     */
    protected $scopeConfig;

    /**
     * GetStoreConfig constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
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
}
