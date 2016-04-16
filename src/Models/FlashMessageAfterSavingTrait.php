<?php namespace Zezont4\ACL\Models;

use Illuminate\Support\Facades\Session;

trait FlashMessageAfterSavingTrait
{
	protected static function boot()
	{
		parent::boot();

		static::created(function () {
			Session::flash("success", config('zlg.model_message.created'));
		});

		if (method_exists('restored', 'read')) {
			static::restored(function () {
				Session::flash('success', config('zlg.model_message.restored'));
			});
		}

		static::updated(function () {
			Session::flash('success', config('zlg.model_message.updated'));
		});

		static::deleted(function () {
			Session::flash('success', config('zlg.model_message.deleted'));
		});
	}
}