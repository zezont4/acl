<?php namespace Zezont4\ACL\Models;

use Illuminate\Support\Facades\Request;

trait SearchFormHelperTrait
{
	/**
	 * search filter form a given array fo fields
	 */
	public function scopeSearch($query)
	{
		return $query->where(function ($query) {
			foreach ($this->searchableFields as $searchableField) {
				$fieldValue = Request::get($searchableField, null);
				if ($fieldValue) {
					$query->where($searchableField, 'LIKE', "%$fieldValue%");
				}
			}
		});
	}

	public function scopeSort($query)
	{
		$sort = Request::get('sort', null);

		return $sort ? $query->orderBy('deleted_at')->orderBy($sort) : $query->orderBy('deleted_at');

	}
}