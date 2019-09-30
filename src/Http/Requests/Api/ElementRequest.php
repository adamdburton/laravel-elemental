<?php

namespace Click\Elemental\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ElementRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return $this->buildRules();
    }

    protected function buildRules()
    {

    }
}
