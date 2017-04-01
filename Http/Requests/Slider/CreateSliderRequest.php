<?php namespace Modules\Theme\Http\Requests\Slider;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateSliderRequest extends BaseFormRequest
{
    protected $translationsAttributesKey = 'theme::sliders.form';

    public function rules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return trans('validation');
    }
}