<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\LogAction;
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
			throw new Exception("Le guard présent dans la requête n'as pas été défini");
		}
		$this->auth = auth($guard)->user();

	}

	//lors de la creation d'un model observé par le logger
	public function created(Model $model)
	{

		//je recuppere l'utilisateur authentifé
		Log::query()->create([
			"loggable_actor_id" => $this->auth->id,
			"loggable_actor_type" => $this->auth::class,
			"loggable_target_id" => $model->getAttribute('id'),
			"loggable_target_type" => $model::class,
			"action" => config('misc.log_action_label.create'),
			"data"=>[

			]
		]);
	}

	//lors de la suppression d'un model observer par le logger
	public function deleted(Model $model)
	{
		Log::query()->create([
			"loggable_actor_id" => $this->auth->id,
			"loggable_actor_type" => $this->auth::class,
			"loggable_target_id" => $model->getAttribute('id'),
			"loggable_target_type" => $model::class,
			"action" => config('misc.log_action_label.delete'),
			"data" => [

			]
		]);
	}

	//lors de la mise à jour d'un modèle observé par le logger
	public function updated(Model $model)
	{
		Log::query()->create([
			"loggable_actor_id" => $this->auth->id,
			"loggable_actor_type" => $this->auth::class,
			"loggable_target_id" => $model->getAttribute('id'),
			"loggable_target_type" => $model::class,
			"action" => config('misc.log_action_label.update'),
			"data"=>[

			]
		]);
	}
}
