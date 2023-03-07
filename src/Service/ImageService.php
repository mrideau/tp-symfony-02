<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpKernel\KernelInterface;

class ImageService
{
    private $kernel;
    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    function saveToDisk(UploadedFile $image) {
//        $uploadDirectory = 'uploads/images/'.date("Y/m/d");
        $uploadDirectory = 'uploads/images/test';
        $path = $this->kernel->getProjectDir().'/public/' . $uploadDirectory;
        $imageName = uniqid() . '.' . $image->guessExtension();
        $image->move($path, $imageName);
        return '/'. $uploadDirectory. '/' . $imageName;
    }
}