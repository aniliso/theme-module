<?php namespace Modules\Theme\Presenters;

use Modules\Core\Presenters\BasePresenter;

class SliderPresenter extends BasePresenter
{
    protected $zone     = 'sliderImage';

    public function font_size()
    {
        if(isset($this->entity->settings->title_font_size) && isset($this->entity->settings->title_font_responsive)) {
            $rangeSize = ($this->entity->settings->title_font_size - $this->entity->settings->title_font_responsive) / 4;
            $titleFontSizes = range($this->entity->settings->title_font_size, $this->entity->settings->title_font_responsive, $rangeSize);
            return $titleFontSizes = "['".implode("','", $titleFontSizes)."']";
        } else {
            return $titleFontSizes = "['50','40','30','20']";
        }
    }

    public function line_height()
    {
        if(isset($this->entity->settings->title_line_height) && isset($this->entity->settings->title_font_responsive)) {
            $rangeSize = ($this->entity->settings->title_line_height - $this->entity->settings->title_font_responsive) / 4;
            $titleLineHeights = range($this->entity->settings->title_line_height, $this->entity->settings->title_font_responsive, $rangeSize);
            return $titleLineHeights = "['".implode("','", $titleLineHeights)."']";
        } else {
            return $titleLineHeights = "['74','66','46','36']";
        }
    }

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