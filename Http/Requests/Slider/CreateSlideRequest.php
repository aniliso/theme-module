<?php namespace Modules\Theme\Http\Requests\Slider;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateSlideRequest extends BaseFormRequest
{

    public function rules()
    {
        return [
          'name' => 'required',
          'slug'  => 'required'
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
        return trans('validation');
    }
}