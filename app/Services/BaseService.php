<?php


namespace App\Services;


use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;


class BaseService
{
    /**
     * Process images
     *
     * @param $path
     * @param $image
     * @param $name
     * @param bool $generateAvatar
     * @param bool $onlyAvatar
     *
     * @return false|string
     */
    public function processImage($path, $image, $name)
    {


        $width = Image::make($image)->width();
        $height = Image::make($image)->height();

        if ($width > 300 || $height > 300) {
            $avatarImage = Image::make($image)->resize(250, 250, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $avatarCanvas = Image::canvas(225, 225, '#000');
            $avatarCanvas->insert($avatarImage, 'center');
            $avatarPath = $path . 'avatar/';
            File::makeDirectory($avatarPath, 0777, true, true);
            $avatarCanvas->save($avatarPath . $name);
            $picture = $avatarPath . $name;
        }

        return json_encode($picture);
    }
}