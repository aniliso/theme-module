<?php namespace Modules\Theme\Presenters;

use Modules\Core\Presenters\BasePresenter;

class SliderPresenter extends BasePresenter
{
    protected $zone     = 'sliderImage';

    public function link()
    {
        $link = new \stdClass();
        $link->title = $link->target = $link->url = '';

        switch ($this->entity->link_type)
        {
            case 'page':
                $link->title = $this->entity->link_title;
                $link->url = route('page', [$this->entity->page->uri]);
                break;
            case 'internal':
                $link->title = $this->entity->link_title;
                $link->url = url($this->entity->uri);
                break;
            case 'external':
                $link->title = $this->entity->link_title;
                $link->target = $this->entity->target;
                $link->url = $this->entity->url;;
                break;
            case 'none':
                break;
            default:
        }

        return $link;
    }
}