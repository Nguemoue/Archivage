<?php

use App\Models\Role;

if (!function_exists("imageFromGender")){
    function imageFromGender(?string $gender=null): string
    {

        $allowedGenders = ['male','female'];
        $gender=$gender??$allowedGenders[0];
        $gender = str($gender)->lower();
        if (!in_array($gender,$allowedGenders)){
            return '';
        }
        if ($gender == $allowedGenders[0]){
            return asset('_materialize_v2/dist/images/profile/user-2.jpg');
        }else{
            return asset("_materialize_v2/dist/images/profile/user-1.jpg");
        }
    }

}

if (!function_exists("generalManager")){
    function generalManager():\App\Models\User|null{
        $generalManager = Role::whereName(config('site.roles.R005.name'))->first()->users()->first();
        if ($generalManager == null){
            $generalManager = Role::whereName(config('site.roles.R000.name'))->first()->users()->first();
        }
        return $generalManager;
    }
}

if (!function_exists("zipAmount")){
    /**
     * renvoie la somme de chaque prix selon de montant
     * @param array $price
     * @param array $quantity
     * @param array|null $discount
     * @return float|null
     */
    function zipAmount(array $price, array $quantity,?array $discount=[]):float|null{
        $tmpPrices = collect($price);
        $tmpQte = $quantity;
        return $tmpPrices->reject(fn($elt)=>($elt==null))->isEmpty()?null:$tmpPrices->zip($tmpQte,$discount)->sum(function ($data){
            //index et leurs signification
            //0 => price,
            //1=> qte
            //2 => discount
            $discount = ($data[2]??0)/100;
            $price = $data[0];
            $qty = $data[1];
            $subprice = ($price * $qty);
            $discountPrice = $discount * $subprice;
            return ($price==null or $qty==null) ? null : ($subprice - $discountPrice);
        });
    }
}

if (!function_exists("dueDate")){
    function termsEndDate($create_at,$terms){

    }
}

if (!function_exists('discountAmount')){
    /**
     * retourne le prix discount en sachant que le discount est une valeur flotante
     * @param float $price
     * @param float $discount
     * @return float
     */
    function discountAmount(float $price, float $discount): float
    {
        return round($price - ($discount*$price),2);
    }
}

if (!function_exists('authRoleCategory')){
    function authRoleCategory():\App\Models\RoleCategory{
        return authUser()->loadMissing("role.roleCategory")->role->roleCategory;
    }
}
if (!function_exists('authUser')){
    function authUser():\Illuminate\Contracts\Auth\Authenticatable|null|\App\Models\User{
        return auth()->user();
    }
}
if (!function_exists('authRole')){
    function authRole():\App\Models\Role{
        return authUser()->loadMissing("role")->role;
    }
}

if(!function_exists("diffMonths")){
    function diffDay(string | \Illuminate\Support\Carbon $date1,string | \Illuminate\Support\Carbon $date2): float|int
    {
        if (is_string($date1)){
            $date1 = \Illuminate\Support\Carbon::parse($date1);
        }
        if (is_string($date2)){
            $date2 = \Illuminate\Support\Carbon::parse($date2);
        }
        return $date1->diffInDays($date2);
    }
}
