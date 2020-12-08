<?php
namespace CGI\CustomSection\CustomerData;
use Magento\Customer\CustomerData\SectionSourceInterface;
use Magento\Customer\Helper\Session\CurrentCustomer;
use Magento\Customer\Helper\View;

class CustomSection implements SectionSourceInterface
{
    /**
     * @var CurrentCustomer
     */
    protected $currentCustomer;

    /**
     * @var View
     */
    private $customerViewHelper;

    /**
     * @param CurrentCustomer $currentCustomer
     * @param View $customerViewHelper
     */
    public function __construct(
        CurrentCustomer $currentCustomer,
        View $customerViewHelper
    ) {
        $this->currentCustomer = $currentCustomer;
        $this->customerViewHelper = $customerViewHelper;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getSectionData()
    {
        if (!$this->currentCustomer->getCustomerId()) {
            return [];
        }

        $customer = $this->currentCustomer->getCustomer();

        return [
            'customdata' => $this->customerViewHelper->getCustomerName($customer),
        ];
    }
}
