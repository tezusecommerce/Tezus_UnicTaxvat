<?php

namespace Tezus\UnicTaxvat\Model\Api;

use Magento\Customer\Model\ResourceModel\CustomerRepository;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Exception\LocalizedException;

class Validation implements ValidationInterface
{
    /** @var SearchCriteriaBuilder  */
    private $_criteriaBuilder;

    /** @var CustomerRepository  */
    private $_customerRepository;

    /**
     * @param CustomerRepository $customerRepository
     * @param SearchCriteriaBuilder $criteriaBuilder
     */
    public function __construct(
        CustomerRepository $customerRepository,
        SearchCriteriaBuilder $criteriaBuilder
    )
    {
        $this->_customerRepository = $customerRepository;
        $this->_criteriaBuilder = $criteriaBuilder;
    }

    /**
     * Field $cpf needs to be already formatted like the taxvat in the database
     * Ex: 000.000.000-00  ||  00000000000 CFP
     * Ex: 00.000.000/0000-00  || 00000000000000 CNPJ
     *
     * @param string $taxvat
     * @return bool
     * @throws LocalizedException
     */
    public function validateTaxvat(string $taxvat): bool
    {
        $criteria = $this->_criteriaBuilder
            ->addFilter("taxvat", $taxvat)
            ->create();
        $customerList = $this->_customerRepository->getList($criteria);

        if (!count($customerList->getItems())){
            return true;
        }else{
            return false;
        }

    }

}
