<?php

namespace CGI\SearchSuiteAutocomplete\Model;

use \CGI\SearchSuiteAutocomplete\Helper\Data as HelperData;
use \CGI\SearchSuiteAutocomplete\Model\SearchFactory;

/**
 * Search class returns needed search data
 */
class Search
{
    /**
     * @var \CGI\SearchSuiteAutocomplete\Helper\Data
     */
    protected $helperData;

    /**
     * @var \CGI\SearchSuiteAutocomplete\Model\SearchFactory
     */
    protected $searchFactory;

    /**
     * Search constructor.
     *
     * @param HelperData $helperData
     * @param \CGI\SearchSuiteAutocomplete\Model\SearchFactory $searchFactory
     */
    public function __construct(
        HelperData $helperData,
        SearchFactory $searchFactory
    ) {
        $this->helperData    = $helperData;
        $this->searchFactory = $searchFactory;
    }

    /**
     * Retrieve suggested, product data
     *
     * @return array
     */
    public function getData()
    {
        $data               = [];
        $autocompleteFields = $this->helperData->getAutocompleteFieldsAsArray();

        foreach ($autocompleteFields as $field) {
            $data[] = $this->searchFactory->create($field)->getResponseData();
        }

        return $data;
    }
}
