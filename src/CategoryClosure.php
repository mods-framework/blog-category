<?php
namespace Mods\Blog\Category;

use  Mods\Category\CategoryClosure as ClosureTable;

class CategoryClosure extends ClosureTable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog_category_closure';
}
