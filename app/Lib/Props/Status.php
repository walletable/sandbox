<?php

namespace App\Lib\Props;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Status
{
    public $value;

    public $parent;



    public function __construct(string $value, Model $parent = null)
    {
        $this->value = $value;

        $this->parent = $parent;
    }

    public function is(string $flag)
    {
        return $this->value === $flag;
    }

    public function is_not(string $flag)
    {
        return !$this->is($flag);
    }

    public function display()
    {
        return config('site.status.'.$this->value.'.name', $this->guessName());
    }

    public function theme()
    {
        return config('site.status.'.$this->value.'.theme', 'primary');
    }

    private function guessName()
    {
        $value = Str::of($this->value)->replace('_', ' ');

        return Str::title($value);
    }

    public function render(string $temp)
    {
        $temp = Str::of($temp);

        foreach ($this->getData() as $key => $value) {

            $temp = $temp->replace('%'.$key.'%', $value);

        }

        return $temp;
    }

    public function getData()
    {
        return [
            'status' => $this->value,
            'name' => $this->display(),
            'theme' => $this->theme()
        ];
    }
}
