<?php namespace Modules\Theme\Http\Requests\Slider;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateSlideRequest extends BaseFormRequest
{
    protected $translationsAttributesKey = 'theme::sliders.form';

    public function rules()
    {
        return [
            'ordering'              => 'required|integer',
            'settings.*'            => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return trans('theme::slides.form');
    }

    public function messages()
    {
        return [];
    }
}