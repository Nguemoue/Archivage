<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class LogObserver
{
	protected Authenticatable|null|User $auth;


	/**
	 * @throws Exception
	 */
	function __construct(Request $request)
	{
		$guard = null;
		if ($request->isAdminUrl()) {
			$guard = adminGuard();
		} elseif ($request->isSuperAdminUrl()) {
			$guard = superAdminGuard();
		} elseif ($request->isWebUrl()) {
			$guard = webGuard();
		} else {
			throw new Exception("guard not definedc");
		}
		$this->auth = auth($guard)->user();

	}

	public function created(Model $model): void
	{
		if (!$this->auth){
			return;
		}
		Log::query()->create([
			"loggable_actor_id" => $this->auth->id,
			"loggable_actor_type" => $this->auth::class,
			"loggable_target_id" => $model->getAttribute('id'),
			"loggable_target_type" => $model::class,
			"action" => config('misc.log_action_label.create'),
			"data"=>[]
		]);
	}

	public function deleted(Model $model): void
	{
		if (!$this->auth){
			return;
		}
		Log::query()->create([
			"loggable_actor_id" => $this->auth->id,
			"loggable_actor_type" => $this->auth::class,
			"loggable_target_id" => $model->getAttribute('id'),
			"loggable_target_type" => $model::class,
			"action" => config('misc.log_action_label.delete'),
			"data" => []
		]);
	}

	public function updated(Model $model): void
	{
		if (!$this->auth){
			return;
		}
		Log::query()->create([
			"loggable_actor_id" => $this->auth->id,
			"loggable_actor_type" => $this->auth::class,
			"loggable_target_id" => $model->getAttribute('id'),
			"loggable_target_type" => $model::class,
			"action" => config('misc.log_action_label.update'),
			"data"=>[]
		]);
	}
}
