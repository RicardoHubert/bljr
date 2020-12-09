<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class SkpiScope implements DataTableScope
{
    public function __construct($isAdmin, $userId)
    {
        $this->isAdmin = ($isAdmin == "admin" || $isAdmin == "ao");
        $this->userId = $userId;
    }

    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        return $this->isAdmin ? $query : $query->where("skpi.user_id", $this->userId);
    }
}
