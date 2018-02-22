<?php namespace Modules\Theme\Presenters;

use Modules\Core\Presenters\BasePresenter;

class SliderPresenter extends BasePresenter
{
    protected $zone     = 'sliderImage';

    public function settings($type = '', $field1='', $field2='', $default='', $encode=false, $stepmode=0)
    {
        switch ($this->entity->settings) {
            case $type == 'range':
                $low = isset($this->entity->settings->{$field1}) ? $this->entity->settings->{$field1} : false;
                $high = isset($this->entity->settings->{$field2}) ? $this->entity->settings->{$field2} : false;
                $step   = $low && $high ? ($low-$high) / 4 : $low / 4;
                if($low && $high) {
                    return $encode ? json_encode(range($low, $high, $step)) : range($low, $high, $step);
                } elseif ($low && $high==false) {
                    if($stepmode>0) {
                        $step = $stepmode / 4;
                        return $encode ? json_encode(range($low, $low+$stepmode, $step)) : range($low, $low+$stepmode, $step);
                    }
                    return $encode ? json_encode(range($low, $step, $step)) : range($low, $step, $step);
                } else {
                    return null;
                }
                break;
            default:
                return $default;
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