<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{

    public static function tree(){
        $categories = MenuItem::get();

        $parentCategories = $categories->whereNull('parent_id');

        self::children($categories, $parentCategories);
        
        return $parentCategories->toArray();
    }

    public static function children($categories, $parentCategories){
        foreach($parentCategories as $parent){
            $parent->children = $categories->where('parent_id', $parent->id)->values();        
            if($parent->children->isNotEmpty()){
                self::children($categories, $parent->children);
                $parent->children = $parent->children->toArray();
            } else {
                //unset($parent->children);
            }
        }
    }

}
