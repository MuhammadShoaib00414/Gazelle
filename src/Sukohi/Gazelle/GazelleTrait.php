<?php namespace Sukohi\Gazelle;

trait GazelleTrait {

    public static function easyValidator($parameters) {

        $data = $rules = $attribute_names = [];

        foreach ($parameters as $key => $value) {

            $data[$key] = \Input::get($key);

            if(is_array($value)) {

                $rules[$key] = $value[0];
                $attribute_names[$key] = $value[1];

            } else {

                $rules[$key] = $value;

            }

        }

        return \Validator::make($data, $rules)->setAttributeNames($attribute_names);

    }

    public static function easySave($keys, $id = -1, $extra_data = []) {

        $model = with(new self())->firstOrNew(['id' => $id]);

        foreach ($keys as $key) {

            $value = (isset($extra_data[$key])) ? $extra_data[$key] : \Input::get($key);
            $model->$key = $value;

        }

        if($model->save()) {

            return $model;

        }

        return null;

    }

}