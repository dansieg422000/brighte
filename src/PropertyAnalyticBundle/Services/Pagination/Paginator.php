<?php

namespace App\PropertyAnalyticBundle\Services\Pagination;

use Knp\Component\Pager\PaginatorInterface as KnpPaginatorInterface;

/**
 * Pagination wrap knp paginator to build result and related pagination data.
 */
class Paginator implements PaginatorInterface
{
    /**
     * @var array|\IteratorAggregate
     */
    private $items;

    /**
     * @var int
     */
    private $totalItemCount;

    /**
     * @var int
     */
    private $currentPageNumber;

    /**
     * @var int
     */
    private $itemNumberPerPage;

    /**
     * @var KnpPaginatorInterface
     */
    private $knpPaginator;

    /**
     * Override Knp Paginator Configuration.
     *
     * @var array
     */
    private $knpPaginatorOptions = [
        'sortFieldParameterName' => null,
        'sortDirectionParameterName' => null,
        'filterFieldParameterName' => null,
        'filterValueParameterName' => null,
    ];

    /**
     * Constructor.
     *
     * @param KnpPaginatorInterface $knpPaginator
     */
    public function __construct(KnpPaginatorInterface $knpPaginator)
    {
        $this->knpPaginator = $knpPaginator;
    }

    /**
     * Retrieves paginated items.
     *
     * @return array|\IteratorAggregate
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Returns pagination custom HTTP response headers.
     *
     * @return array
     */
    public function getCustomHeaders()
    {
        return [
            'X-Pagination-Count' => $this->totalItemCount,
            'X-Pagination-Page' => $this->currentPageNumber,
            'X-Pagination-Limit' => $this->itemNumberPerPage,
        ];
    }

    /**
     * Paginates any thing into Pagination object.
     *
     * @param mixed $target - anything what needs to be paginated
     * @param int   $page   - page number, starting from 1
     * @param int   $limit  - number of items per page
     *
     * @return self
     */
    public function paginate($target, $page = self::DEFAULT_PAGE, $limit = self::DEFAULT_LIMIT)
    {
        // Limit item per page cannot over maximum limit
        $limit = ($limit > self::MAX_LIMIT) ? self::MAX_LIMIT : $limit;

        // Handle pagination
        $pagination = $this->knpPaginator->paginate($target, $page, $limit, $this->knpPaginatorOptions);

        // Build response information
        $this->items = $pagination->getItems();
        $this->totalItemCount = $pagination->getTotalItemCount();
        $this->currentPageNumber = $pagination->getCurrentPageNumber();
        $this->itemNumberPerPage = $pagination->getItemNumberPerPage();

        return $this;
    }
}
