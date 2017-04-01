<?php

namespace Modules\Theme\Entities\Helpers;

/**
 * Class Status
 * @package Modules\Blog\Entities
 */
class Status
{
    const DRAFT = 0;
    const PUBLISHED = 1;

    /**
     * @var array
     */
    private $statuses = [];

    public function __construct()
    {
        $this->statuses = [
            self::DRAFT => trans('theme::theme.status.draft'),
            self::PUBLISHED => trans('theme::theme.status.published')
        ];
    }

    /**
     * Get the available statuses
     * @return array
     */
    public function lists()
    {
        return $this->statuses;
    }

    /**
     * Get the post status
     * @param int $statusId
     * @return string
     */
    public function get($statusId)
    {
        if (isset($this->statuses[$statusId])) {
            return $this->statuses[$statusId];
        }

        return $this->statuses[self::DRAFT];
    }
}
