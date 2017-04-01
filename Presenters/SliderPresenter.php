<?php namespace Modules\Theme\Presenters;

use Laracasts\Presenter\Presenter;

class SliderPresenter extends Presenter
{
    public function __construct($entity)
    {
        parent::__construct($entity);
    }

    public function firstImage($width, $height, $mode, $quality)
    {
        if($file = $this->entity->files()->first()) {
            return \Imagy::getImage($file->filename, 'sliderImage', ['width' => $width, 'height' => $height, 'mode' => $mode, 'quality' => $quality]);
        }
        return null;
    }

    public function link()
    {
        $link = new \stdClass();
        $link->title = $link->target = $link->url = '';

        switch ($this->entity->link_type)
        {
            case 'page':
                $link->title = $this->entity->link_title;
                $link->url = route('page', [$this->entity->page->slug]);
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