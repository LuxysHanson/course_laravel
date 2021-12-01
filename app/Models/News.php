<?php

namespace App\Models;

use App\Components\Enums\News\NewsStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class News extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->created_at = Carbon::now()->format('Y-m-d H:i:s');
    }

    protected $fillable = [
        'title',
        'slug',
        'image',
        'category_id',
        'description',
        'is_moderate'
    ];

    // Получает новости из файла
    public static function getNews(): array
    {
        return json_decode(File::get(storage_path() . '/news.json'), true) ?: [];
    }

    /**
     * Получаем только опубликованные новости
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_moderate', '=', NewsStatusEnum::STATUS_PUBLISHED);
    }

    /**
     * Получаем новости по фильтру
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeFilter($query)
    {
        if (!is_null(request('status'))) {
            $query->where('is_moderate', '=', (bool)request('status'));
        }

        return $query;
    }

}
