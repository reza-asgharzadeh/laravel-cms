<?php
namespace App\View\Composers;
use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer{
    protected object $categories;

    public function __construct()
    {
        $this->categories = Category::with('children')->where('category_id',null)->get();
    }

    public function compose(View $view)
    {
        $view->with('categories',$this->categories);
    }
}
