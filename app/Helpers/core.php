<?php

use JetBrains\PhpStorm\Pure;

if (!function_exists("vat")){
    /**
     * Valeur de la vat définié par défaut
     * @return float
     */
    function vat():float{
        return  15/100;
    }
}
if (!function_exists("vatPrice")){
    /**
     * Prix calculé selon la vat
     * @param float $price
     * @return float
     */
    #[Pure]
    function vatPrice(float $price):float{
        return round($price+($price*vat()),2);
    }
}
if (!function_exists("price")){
    /**
     * Formatage du prix selon pms
     * @param float $amount
     * @param bool $devise
     * @return string
     */
    function price(float $amount, bool $devise=false): string
    {
        $formattedPrice = number_format($amount, 2);
        if ($devise){
            $formattedPrice =  config('misc.devise','R').config('misc.devise_separator',' ').$formattedPrice;
        }
        return  $formattedPrice;
    }
}
if (!function_exists("bcc")){
    /**
     * Liste de bcc definies dans pms
     * @return array
     */
    function bcc(): array
    {
        return [config('mail.bcc')];
    }
}

if (!function_exists("branchDomain")){
    /**
     * Nom du domaine pour la partie branch dans pms
     * @return string
     */
    function branchDomain(): string
    {
        return config("setup.branch_prefix").'.'.config('site.domain_name');
    }
}

if (!function_exists("mainDomain")){
    /**
     * Nom du domaine principale
     * @return string
     */
    function mainDomain(): string
    {
        return config('site.domain_name');
    }
}
