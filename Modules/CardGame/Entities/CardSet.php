<?php

namespace Modules\CardGame\Http\Entities;

use App\Model\BaseModel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property integer $id
 * @property string  $name
 * @property integer $type_id
 * @property integer $user_id
 * @property integer $race_id
 * @property integer $avatar_id
 * @property boolean $seen
 * @property integer $shirt_id
 * @property integer $background_id
 * @property integer $border_id
 * @property string  $price
 *
 * @property Carbon  $deleted_at
 *
 * @property Card[]  $cards
 */
class CardSet extends BaseModel
{
    use SoftDeletes;

    const TABLE_NAME = 'card_sets';

    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * Атрибуты, для которых запрещено массовое назначение.
     *
     * @var array
     */
    protected $guarded = [];

    public $timestamps = false;

    /**
     * @return HasMany
     */
    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
