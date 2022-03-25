<?php

namespace App\Http\Livewire\Account;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Lib\File\Avatar\AvatarUploader;

class ProfilePicture extends Component
{
    use WithFileUploads;

    /**
     * Error Data
     * @var array|mixed
     */
    public $errors = [];

    public $avatar;

    public function render()
    {
        return view('livewire.account.profile-picture');
    }

    public function emitErrors()
    {
        $this->emit('errors', $this->errors);
        $this->errors = [];
    }

    public function hasErrors()
    {
        return ( $this->errors ) ? true : false;
    }

    /**
     * Validate Profile inputs
     */
    public function validated()
    {
        $validator = Validator::make($this->data(), [
            'avatar' => 'required|image|min:10|max:2046',
        ]);

        $errors = $validator->errors()->all();

        if ($errors) {
            $this->errors += $errors;
        }
    }

    public function data()
    {
        return $this->only([
            'avatar',
        ]);
    }

    public function changeAvatar()
    {
        $this->validated();

        if ( $this->hasErrors() ){
            $this->emitErrors();
            return ;
        }

        $avatar = Auth::user()->avatar;

        Auth::user()->update([
            'avatar' => (new AvatarUploader($this->avatar))->store(),
        ]);

        $avatar->destroy();
        $this->removeAvatar();

        $this->emit('success', [
            'title' => 'Avatar Changed',
            'message' => 'Your account has a new avatar',
        ]);
    }

    /**
     * Remove avatar from component
     * 
     * @return void
     */
    public function removeAvatar()
    {
        $this->avatar = null;
    }

    /**
     * Return the url of the avater state
     *
     * @param mixed $file
     * @return string
     */
    public function temporaryUrl($file): string
    {
        $url = Auth::user()->avatar->child('small')->url();

        if ($file && $file instanceof \Livewire\TemporaryUploadedFile) {
            try {
                $url = $file->temporaryUrl();
            } catch (\Throwable $th) {
                $url = Auth::user()->avatar->child('small')->url();
            }
        }

        return $url;
    }
}
