<?php
require_once 'vendor/autoload.php';
use Intervention\Image\ImageManagerStatic as Image;


class Im
{
    public function resizeImage()
    {
        $image = Image::make('avengers.jpg')
            ->resize(200, null, function ($im) {
                $im -> aspectRatio();
            })
            ->rotate(45)
            ->text('watermark', 30, 0, function($font) {
                $font->color('#800000');
                $font->valign('top');
            })
            ->save('new_avenger.jpg');

        echo '<img src="new_avenger.jpg">';
    }
}

$image = New Im();
$image -> resizeImage();