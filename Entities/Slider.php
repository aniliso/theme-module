<?php

namespace Modules\Theme\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Media\Image\Facade\Imagy;
use Modules\Media\Support\Traits\MediaRelation;
use Modules\Page\Entities\Page;
use Modules\Theme\Presenters\SliderPresenter;

class Slider extends Model
{
    use Translatable, MediaRelation, PresentableTrait;

    protected $table = 'theme__sliders';
    public $translatedAttributes = ['title', 'sub_title', 'content', 'link_title', 'url', 'uri', 'target'];
    protected $fillable = ['page_id', 'title', 'sub_title', 'content', 'link_type', 'url', 'uri', 'link_title', 'target', 'ordering', 'status', 'position_x', 'position_y'];

    protected $presenter = SliderPresenter::class;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Slide()
    {
        return $this->belongsTo(Slide::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

    /**
     * @return bool
     */
    public function hasImage()
    {
        return isset($this->files()->first()->filename) ? true : false;
    }

    /**
     * @return bool|\Illuminate\Contracts\Routing\UrlGenerator|mixed|string
     */
    public function getLinkAttribute()
    {
        $link = new \stdClass();
        $link->title = $link->target = $link->url = '';

        switch ($this->getAttribute('link_type'))
        {
            case 'page':
                $link->title = $this->getAttribute('link_title');
                $link->url = route('page', [$this->page->slug]);
                break;
            case 'internal':
                $link->title = $this->getAttribute('link_title');
                $link->url = url($this->getAttribute('uri'));
                break;
            case 'external':
                $link->title = $this->getAttribute('link_title');
                $link->target = $this->getAttribute('target');
                $link->url = $this->getAttribute('url');
                break;
            case 'none':
            break;
            default:
        }
        return $link;
    }
}
