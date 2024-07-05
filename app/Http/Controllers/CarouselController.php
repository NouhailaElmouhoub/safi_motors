<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarouselController extends Controller
{
    public function show()
    {
        // Tableau de noms de fichiers d'images
        $images = [
            'banner_audi.jpg',
            'banner_cupra.png',
            'banner_SEAT.png',
            'banner_SKODA.png',
            'vk_banner.webp',
            // Ajoutez d'autres noms d'images selon vos besoins
        ];

        // Renvoyer la vue du carrousel avec les images
        return view('carousel', ['images' => $images]);
    }
    
}
