<?
namespace App;

use Baum\Node;

/**
 * Class Category
 * @package App
 */
class Category extends Node {

    /**
     * @var array
     */
    protected $guarded = ['lft', 'rgt', 'depth'];

    /**
     * @var array
     */
    protected $fillable = ['id', 'parent_id' , 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}