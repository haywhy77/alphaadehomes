<?php

class ImageManipulator {
    private $image;
    private $width;
    private $height;

    public function __construct($imagePath) {
        $this->image = imagecreatefromjpeg($imagePath); // Assumes JPEG, modify as needed
        $this->width = imagesx($this->image);
        $this->height = imagesy($this->image);
    }

    public function resize($newWidth, $newHeight, $mode = 'inside') {
        $ratio = $this->width / $this->height;
        $newRatio = $newWidth / $newHeight;

        if ($mode === 'outside') {
            if ($ratio > $newRatio) {
                $resizeHeight = $newHeight;
                $resizeWidth = $this->width / ($this->height / $newHeight);
            } else {
                $resizeWidth = $newWidth;
                $resizeHeight = $this->height / ($this->width / $newWidth);
            }
        } else { // 'inside' mode
            if ($ratio > $newRatio) {
                $resizeWidth = $newWidth;
                $resizeHeight = $this->height / ($this->width / $newWidth);
            } else {
                $resizeHeight = $newHeight;
                $resizeWidth = $this->width / ($this->height / $newHeight);
            }
        }

        // Round the dimensions to the nearest integer
        $resizeWidth = round($resizeWidth);
        $resizeHeight = round($resizeHeight);

        $resized = imagecreatetruecolor($resizeWidth, $resizeHeight);
        imagecopyresampled($resized, $this->image, 0, 0, 0, 0, $resizeWidth, $resizeHeight, $this->width, $this->height);

        $this->image = $resized;
        $this->width = $resizeWidth;
        $this->height = $resizeHeight;

        return $this;
    }

    public function crop($horizontalAlign, $verticalAlign, $cropWidth, $cropHeight) {
        $x = 0;
        $y = 0;

        switch ($horizontalAlign) {
            case 'left':
                $x = 0;
                break;
            case 'center':
                $x = ($this->width - $cropWidth) / 2;
                break;
            case 'right':
                $x = $this->width - $cropWidth;
                break;
        }

        switch ($verticalAlign) {
            case 'top':
                $y = 0;
                break;
            case 'middle':
                $y = ($this->height - $cropHeight) / 2;
                break;
            case 'bottom':
                $y = $this->height - $cropHeight;
                break;
        }

        // Round the x and y coordinates to the nearest integer
        $x = round($x);
        $y = round($y);

        $cropped = imagecreatetruecolor($cropWidth, $cropHeight);
        imagecopy($cropped, $this->image, 0, 0, $x, $y, $cropWidth, $cropHeight);

        $this->image = $cropped;
        $this->width = $cropWidth;
        $this->height = $cropHeight;

        return $this;
    }

    public function save($path) {
        imagejpeg($this->image, $path);
    }

    public function __destruct() {
        imagedestroy($this->image);
    }
}

// Usage example
// $img = new ImageManipulator('path/to/your/image.jpg');
// $img->resize(200, 150, 'outside')->crop('center', 'middle', 200, 150);
// $img->save('path/to/save/resized_and_cropped_image.jpg');
?>