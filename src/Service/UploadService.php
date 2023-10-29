<?php
namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\String\Slugger\SluggerInterface;

class UploadService {

    public function __construct(SluggerInterface $slugger)
    {
        $this->slugger = $slugger;
    }

    public function upload($file, string $directory): string
    {
        //Si on a chargé l'image
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        // Ceci est nécessaire pour inclure en toute sécurité le nom du fichier dans l'URL
        $safeFilename = $this->slugger->slug($originalFilename);
        $newFilename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        // Déplacez le fichier vers le répertoire où sont stockés les images
        try {
            $file->move($directory, $newFilename);
        } catch (FileException $e) {
            // ... gérer l'exception si quelque chose se produit pendant le téléchargement de fichiers
        }

        return $newFilename;
    }

}
