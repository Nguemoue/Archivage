<?php

namespace App\View\Components;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Permission extends Component
{
	public $permissions;
	public $auth;
	public $show;
	public $operand = "and";
	public function __construct($permissions,$auth = null,$operand = "and"){
		$this->permissions = $permissions;
		$this->operand = $operand;
		if($auth == null){
			if(request()->isSuperAdminUrl()){
				$guard = superAdminGuard();
			}elseif (request()->isAdminUrl()){
				$guard = adminGuard();
			}else{
				$guard = webGuard();
			}
			$this->auth = auth($guard)->user();
		}else{
			$this->auth = $auth;
		}
//		Admin::find(1)->hasPermissionTo();
		if(is_array($permissions)){
			if($this->operand == "and"){
				$this->show = $this->auth->hasAllPermissions($permissions);
			}else{
				$this->show = $this->auth->hasAnyPermission($permissions);
			}
		}else{
			$this->show = $this->auth->hasPermissionTo($permissions);
		}
	}
	public function render(): View
	{
        return view('components.permission');
    }
}
