<?php

namespace App\Models;

use Spatie\Tags\HasTags;
use App\Models\BaseModel;
use Illuminate\Support\Str;
use Spatie\Activitylog\LogOptions;
use Overtrue\LaravelLike\Traits\Likeable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use AliBayat\LaravelCategorizable\Categorizable;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use Digikraaft\ReviewRating\Traits\HasReviewRating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Touhidurabir\MultiKyeRouteBinding\HasMultipleRouteBindingKeys;

class Resource extends BaseModel implements Viewable
{
    use HasFactory;
    use InteractsWithViews;
    use Likeable;
    use SoftDeletes;
    use HasTags;
    use HasMultipleRouteBindingKeys;
    use Categorizable;
    use HasReviewRating;
    use LogsActivity;

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->uuid = Str::uuid()->toString();
            $model->user_id = auth()->id();
        });

        self::updating(function ($model) {
            if (!$model->uuid) {
                $model->uuid = Str::uuid()->toString();
            }
        });
    }

    /**
     * The attributes that will be used for multiple key binding on route models
     *
     * @var array
     */
    protected $routeBindingKeys = ['uuid'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'brief', 'description', 'user_id'];

    /**
     * The attributes that should be logged for the user.
     *
     * @return array
     */
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logFillable()
            ->logOnlyDirty();
    }

    /**
     * Get the user that made this post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the updates related to this resource.
     */
    public function updates()
    {
        return $this->hasMany(ResourceUpdate::class)->orderBy('created_at', 'desc');
    }

    public function getDownloadsAttribute()
    {
        return $this->updates->sum('downloads');
    }
}
