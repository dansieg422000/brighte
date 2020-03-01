<?php

namespace App\PropertyAnalyticBundle\Services\Pagination;

/**
 * Define required paginator behaviors.
 */
interface PaginatorInterface
{
    /**
     * Default start index of current page
     */
    const DEFAULT_PAGE = 1;

    /**
     * Default number of item per page.
     */
    const DEFAULT_LIMIT = 10;

    /**
     * Maximum number of item per page.
     */
    const MAX_LIMIT = 200;

    /**
     * Paginates any thing into Pagination object.
     *
     * @param mixed $target - anything what needs to be paginated
     * @param int   $page   - page number, starting from 1
     * @param int   $limit  - number of items per page
     *
     * @return self
     */
    public function paginate($target, $page, $limit);

    /**
     * Retrieves paginated items.
     *
     * @return array|\IteratorAggregate
     */
    public function getItems();

    /**
     * Retrieves metadata pagination custom headers which are used for HTTP Response header.
     *
     * @return array
     */
    public function getCustomHeaders();
}
