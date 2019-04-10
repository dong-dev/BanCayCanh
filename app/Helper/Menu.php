<?php

namespace App\Helper;
use App\Category;

class Menu 
{
	public static function getMenu(){
		$categories = Category::all()->toArray();
		return Menu::getParent(0, $categories);
	}

	public static function getParent($parent, $list) {
		$rs = [];
		foreach ($list as $key => $item) {
			if($item['parent_id'] == $parent) {
				$menuItem = [];
				$menuItem['id'] = $item['id'];
				$menuItem['name'] = $item['name'];
				unset($list[$key]);
				$menuItem['submenu'] = Menu::getParent($item['id'], $list);
				$rs[] = $menuItem;
			}
		}

		return $rs;
	}
}
