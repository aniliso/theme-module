<?php namespace Modules\Theme\Http\Requests\Slider;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateSliderRequest extends BaseFormRequest
{
    protected $translationsAttributesKey = 'theme::sliders.form';

    public function rules()
    {
        return [
            'position_x' => 'integer',
            'position_y' => 'integer'
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return trans('theme::sliders.form');
    }

    public function messages()
    {
        return trans('validation');
    }
}