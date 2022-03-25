<div>
    {{-- In work, do what you enjoy. --}}
    <div class="form-group row">
        <div class="col-lg-2 col-xl-2"></div>
        <div class="col-lg-8 col-xl-8 text-center">
            <div class="image-input image-input-outline image-input-circle" id="kt_user_avatar" style="background-image: url(assets/media/users/blank.png)">
                <div class="image-input-wrapper" style="background-image: url({{ $this->temporaryUrl($avatar) }})"></div>
                <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                    <i class="fa fa-pen icon-sm text-muted"></i>
                    <input type="file" wire:model="avatar" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                </label>
            </div>
            <br>
            <div class="form-text text-muted" wire:loading wire:target="avatar">Previewing...</div>
        </div>
        <div class="col-lg-2 col-xl-2"></div>
    </div>
    @if ($avatar)
    <div class="card-footer text-center bg-gray-100 border-top-0">
        <button type="button" wire:click.prevent="changeAvatar" class="btn btn-primary">Save</button>
        <button type="button" wire:click.prevent="removeAvatar" class="btn btn-danger">Remove</button>
    </div>
    @endif
</div>
