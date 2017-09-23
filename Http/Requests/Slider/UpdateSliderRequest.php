<?php namespace Modules\Theme\Http\Requests\Slider;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateSliderRequest extends BaseFormRequest
{
    protected $translationsAttributesKey = 'theme::sliders.form';

    public function rules()
    {
        return [
            'ordering' => 'required|integer',
            'position_x' => 'required|integer',
            'position_y' => 'required|integer'
        ];
    }

    public function attributes()
    {
        return trans('theme::sliders.form');
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [];
    }
}