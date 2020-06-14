<?php


namespace App\Filters;

use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Laratrust\Laratrust;

class LaratrustFilter implements FilterInterface
{
    public function transform($item, Builder $builder)
    {
        //dd($item);
        if (isset($item['permission']) && ! Laratrust::isAbleTo($item['permission'])) {
            return false;
        }

        return $item;
    }
}
