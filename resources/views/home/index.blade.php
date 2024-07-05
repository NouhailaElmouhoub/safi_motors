@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')

<style>
/* Ajoutez une classe CSS personnalisée pour définir une taille fixe aux images */
.carousel-item img {
    width: 100%; /* Définissez la largeur souhaitée */
    height: 500px; /* Définissez la hauteur souhaitée */
    object-fit: cover; /* Pour s'assurer que l'image remplit entièrement le conteneur tout en conservant son ratio d'aspect */
}

.img {
    width: 100%; /* Définissez la largeur souhaitée */
    height: 150px; /* Définissez la hauteur souhaitée */
}

/* CSS pour styliser les images */
.img-fluid {
    transition: transform 0.3s ease; /* Animation de transition */
}

/* Effet de zoom au survol */
.img-fluid:hover {
    transform: scale(1.1); /* Zoom de 10% */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
}

/* Stylisation du titre "Populaires" */
.title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px; /* Ajoutez un espace en bas du titre */
    text-align: center; /* Centrez le texte */
}

/* Style pour les sous-titres */
.subtitle {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
}

</style>



<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="2000">
  <div class="carousel-inner">
      <div class="carousel-item active">
          <img class="d-block w-100" src="{{ asset('img/banner_audi.jpg') }}" alt="First slide">
      </div>
      <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/banner_SKODA.webp') }}" alt="Second slide">
      </div>
      <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/vk_banner.webp') }}" alt="Third slide">
      </div>
      <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/banner_cupra.png') }}" alt="Fourth slide">
      </div>
      <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/banner_SEAT.png') }}" alt="Finally slide">
      </div>
  </div>
</div>

<!-- Ajoutez le titre "Populaires" -->

<div class="row mt-1"> <!-- Ajoutez un espace en haut des cartes -->
  {{-- <div class="col-md-8 col-lg-3 mb-3">
      <img src="{{ asset('/img/audiiii.png') }}" class="img-fluid rounded img">
      <div class="subtitle">Audi</div> <!-- Ajoutez le sous-titre -->
  </div> --}}<h2 class="title text-decoration-underline">Populaires</h2>
  <div class="col-md-8 col-lg-3 mb-3">
      <img src="{{ asset('/img/arona.png') }}" class="img-fluid rounded img">
      <div class="subtitle">Arona</div> <!-- Ajoutez le sous-titre -->
  </div>
  <div class="col-md-8 col-lg-3 mb-3">
      <img src="{{ asset('/img/formento.png') }}" class="img-fluid rounded img">
      <div class="subtitle">Formento</div> <!-- Ajoutez le sous-titre -->
  </div>
  <div class="col-md-8 col-lg-3 mb-3">
      <img src="{{ asset('/img/KODIAQ.webp') }}" class="img-fluid rounded img">
      <div class="subtitle">Kodiaq</div> <!-- Ajoutez le sous-titre -->
  </div>
  <div class="col-md-8 col-lg-3 mb-3">
      <img src="{{ asset('/img/R.png') }}" class="img-fluid rounded img">
      <div class="subtitle">TROC</div> <!-- Ajoutez le sous-titre -->
  </div>
</div>



<div>
    <h2 class="title text-decoration-underline">Localisation</h2>
    <div>
      <iframe 
        title='SAFI MOTORS' 
        width="100%" 
        height="500" 
        frameBorder="0" 
        scrolling="no" 
        marginHeight="0" 
        marginWidth="0" 
        src="https://maps.google.com/maps?width=100%25&amp;height=400&amp;hl=en&amp;q=RES%20ADDOUHA%20BD%20MLY%20YOUSSEF,SAFI%20MOROCCO+(SAFI%20MOTORS-Volswagen%20&amp;%20Skoda)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
      </iframe>
    </div>
    <div>
      Coordinates: Latitude 31.1166° N, Longitude 9.2365° W
    </div>
  </div>
@endsection
