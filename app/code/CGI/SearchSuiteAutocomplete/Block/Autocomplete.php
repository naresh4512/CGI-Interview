<?php

namespace CGI\SearchSuiteAutocomplete\Block;

use CGI\SearchSuiteAutocomplete\Helper\Data;
use Magento\Framework\View\Element\Template\Context;

/**
 * Autocomplete class used for transport config data
 */
class Autocomplete extends \Magento\Framework\View\Element\Template
{
    /**
     * @var Data
     */
    protected $helperData;

    /**
     * Autocomplete constructor.
     *
     * @param Data $helperData
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        Data $helperData,
        Context $context,
        array $data = []
    ) {

        $this->helperData = $helperData;
        parent::__construct($context, $data);
    }

    /**
     * Retrieve search delay in milliseconds (500 by default)
     *
     * @return int
     */
    public function getSearchDelay()
    {
        return $this->helperData->getSearchDelay();
    }

    /**
     * Retrieve search action url
     *
     * @return string
     */
    public function getSearchUrl()
    {
        return $this->getUrl("cgi_searchsuiteautocomplete/ajax/index");
    }
}
