<?php
namespace Mods\Blog\Category;

use Mods\Blog\Models\Post;
use Mods\Category\Category as BaseCategory;

class Category extends BaseCategory
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'blog_category';

    /**
     * ClosureTable model instance.
     *
     * @var CategoryClosure
     */
    protected $closure = \Mods\Blog\Category\CategoryClosure::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug'];


    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_blog_post', 'category_id', 'post_id');
    }

}
