<?php

namespace App\Lib\File\Avatar;

use App\Lib\Traits\WorkWithProperties;
use Illuminate\Database\Eloquent\Model;
use App\Lib\Props\Status;
use JsonSerializable;


class Avatar implements JsonSerializable
{

    use WorkWithProperties;


    public $name;

    public $extension;

    public $mime;

    public $size;

    public $status = null;

    public $statusObj = null;

    public $dimension;

    public $sizes = [];

    public $parent;

    protected $children = [];



    
    public function __construct(array $data, object $parent = null)
    {
        $this->fill($data);

        $this->fill(
            [
                'parent' => $parent,
            ]
        );
        
        $this->build();

    }


    public function status()
    {
        if ($this->statusObj) return $this->statusObj;

        return $this->statusObj = new Status($this->status);
    }

    
    public function is_model()
    {
        if ($this->parent instanceof Model) return true;

        return false;
    }



    
    public function is_not_model()
    {
        if ($this->parent instanceof Model) return false;

        return true;
    }



    
    public function is_avatar()
    {
        if ($this->parent instanceof self) return true;

        return false;
    }



    
    public function is_not_avatar()
    {
        if ($this->parent instanceof self) return false;

        return true;
    }



    
    private function build()
    {
        foreach ($this->sizes as $key => $value) {

            $this->setChild($key, $value);

        }
    }



    
    public function fullname()
    {
        return $this->name.'.'.$this->extension;
    }



    
    private function setChild( string $key, array $data )
    {
        $this->children[$key] = new self($data, $this);
    }



    
    public function child( string $key )
    {
        return $this->children[$key] ?? $this;
    }



    
    public function hasChildren()
    {
        return ( count($this->children) )? true : false;
    }



    
    public function destroyChildren()
    {
        if (!$this->hasChildren()) return;

        foreach ($this->children as $key => $child) {
            $child->destroy();
        }
    }



    
    public function path()
    {
        return avatar($this->fullname());
    }



    
    public function unlink()
    {
        return (!AvatarUploader::disk()->exists($this->path()))? : AvatarUploader::disk()->delete($this->path());
    }



    
    public function destroy()
    {
        if ($this->status && $this->status()->is('default')) return;

        $this->unlink();

        if ($this->hasChildren()) $this->destroyChildren();
    }



    public function changeStatus(string $status)
    {
        $avatar = ($this->is_model())? $this : $this->parent;

        $avatar->status = $status;

        $avatar->parent->fill(
            [
                'avatar' => $avatar->allData(),
            ]
        )->save();
    }

    public function allData()
    {
        return $this->only(
            [
                'name',
                'extension',
                'mime',
                'size',
                'status',
                'dimension',
                'sizes',
            ]
        );
    }



    
    public function url()
    {
        return avatar_url( $this->fullname() );
    }


    public function toArray()
    {
        $data = [
            'url' => $this->url()
        ] + $this->only(
            [
                'extension',
                'mime',
                'size',
                'dimension',
            ]
        );

        if ($this->hasChildren()) $data['status'] = $this->status;

        if ($this->hasChildren()) $data['sizes'] = $this->children;

        return $data;
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

}
