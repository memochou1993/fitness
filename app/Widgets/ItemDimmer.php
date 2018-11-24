<?php

namespace App\Widgets;

use App\Item;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Widgets\BaseDimmer;
use Illuminate\Support\Facades\Auth;

class ItemDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Item::count();
        $string = 'Items';

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-group',
            'title'  => "${count} ${string}",
            'text'   => "You have ${count} items in your database. Click on button below to view all items.",
            'button' => [
                'text' => 'View all items',
                'link' => route('voyager.items.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/item.jpg'),
        ]));
    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
        return Auth::user()->can('browse', app(Item::class));
    }
}
