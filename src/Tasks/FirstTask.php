<?php

namespace App\Tasks;

use App\Repositories\CustomersRepository;
use App\Request;
use Illuminate\Support\Collection;

/**
 * Первое задание
 */
class FirstTask
{
    private CustomersRepository $customersRepository;

    public function __construct()
    {
        $this->customersRepository = new CustomersRepository();
    }

    /**
     * @param Request $request
     *
     * @return Collection
     */
    public function getCustomers(Request $request): Collection
    {
        $customerIds = [];
        $fromYear    = 0;
        $toYear      = 0;
        $author      = '';

        if ($request->get('customer_ids')) {
            $customerIds = explode(',', $request->get('customer_ids'));
            $customerIds = array_filter($customerIds, static fn($value) => ($value !== null) && ($value !== ''));
        }
        
        if ($request->get('years')) {
            $ages     = explode(',', $request->get('years'));
            $agesFrom = (int)max($ages);
            $agesTo   = (int)min($ages);
        }

        if (!empty($agesFrom) && !empty($agesTo)) {
            $fromYear = getYearOfBirthByAge($agesFrom);
            $toYear   = getYearOfBirthByAge($agesTo);
        }

        if ($request->get('author')) {
            $author = $request->get('author');
        }

        return $this->customersRepository->getCustomers($customerIds, $fromYear, $toYear, $author);
    }

}
