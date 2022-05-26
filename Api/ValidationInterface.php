<?php

namespace Tezus\UnicTaxvat\Api;

interface ValidationInterface
{
    /**
     * @param string $taxvat
     * @return bool
     */
    public function validateTaxvat(string $taxvat): bool;
}
