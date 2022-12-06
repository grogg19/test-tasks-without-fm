<?php

namespace App\Repositories;

use App\Models\Customer;
use Illuminate\Support\Collection;

/**
 * Репозиторий CustomersRepository
 */
class CustomersRepository
{
    /**
     * @param array  $customerIds
     * @param int    $fromYear
     * @param int    $toYear
     * @param string $author
     *
     * @return Collection
     */
    public function getCustomers(array $customerIds = [], int $fromYear = 0, int $toYear = 0, string $author = ''): Collection
    {
        $query = Customer::with('gender')
            ->leftJoin('owners', 'customers.id', '=', 'owners.customer_id')
            ->leftJoin('books', 'owners.book_id', '=', 'books.id')
            ->leftJoin('authors', 'books.author_id', '=', 'authors.id')
            ->whereNotNull('owners.id')
            ->withCount('books')
            ->groupBy('customers.id');

        if (!empty($customerIds)) {
            $query->whereIn('customers.id', $customerIds);
        }

        if (!empty($author)) {
            $query->where('authors.last_name', 'like', $author);
        }

        if ($fromYear !== 0) {
            $query->whereYear('customers.birth_date', '>=', $fromYear);
        }

        if ($toYear !== 0) {
            $query->whereYear('customers.birth_date', '<=', $toYear);
        }

        return $query->get();
    }
}
