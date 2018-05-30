<?
namespace App;

use App\Services\ItemService;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 * @package App
 */
class Item extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'image',
        'category_id',
    ];

    /**
     * @var array
     */
    protected $appends = ['image_url'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return string
     */
    public function getImageUrlAttribute()
    {
        return ItemService::getUploadUrl($this->getKey()) . DIRECTORY_SEPARATOR . $this->image;
    }
}