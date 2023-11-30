@component('mail::message')

# {{ $seriesName }} criada!

- Temporadas: {{ $seasonsQty }}
- Episódios por temporada: {{ $episodesPerSeason }}

Acesse aqui: 

@component('mail::button', ['url' => route('seasons.index', $seriesId)])
    Ver série
@endcomponent    

@endcomponent