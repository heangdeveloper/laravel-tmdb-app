@extends('layout.app')

@section('content')
    <div class="movie-info bg-cover bg-no-repeat" style="background-image: url('{{ 'https://image.tmdb.org/t/p/original/' . $movie['backdrop_path'] }}')">
        <div style="background-image: linear-gradient(to right, rgba(7.84%, 8.63%, 9.80%, 1.00) 150px, rgba(7.84%, 8.63%, 9.80%, 0.84) 100%)">
            <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
                <div class="flex-none">
                    <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" class="w-72"/>
                </div>
                <div class="md:ml-24">
                    <h2 class="text-4xl font-semibold text-white">{{ $movie['title'] }}</h2>
                    <div class="flex items-center text-gray-400 text-sm">
                        <svg class="fill-current text-yellow-500 w-4" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="ml-1">{{ $movie['vote_average'] * 10 . '%' }}</span>
                        <span class="mx-2">|</span>
                        <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, y') }}</span>
                        <span class="mx-2">|</span>
                        <span>
                            @foreach ( $movie['genres'] as $genres )
                                {{ $genres['name'] }} @if (!$loop->last), @endif
                            @endforeach
                        </span>
                    </div>
                    <div class="mt-4">
                        <h4 class="font-bold text-2xl text-white">Overview</h4>
                        <p class="text-gray-100">{{ $movie['overview'] }}</p>
                    </div>
                    <div class="mt-12">
                        <div class="flex mt-4">
                            @foreach ($movie['credits']['crew'] as $crew)
                                @if ($loop->index < 3)
                                    <div class="mr-12">
                                        <div class="text-white font-semibold">{{ $crew['name'] }}</div>
                                        <div class="text-sm text-gray-100">{{ $crew['job'] }}</div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-12">
                        <a href="https://www.youtube.com/watch?v={{ $movie['videos']['results'][1]['key'] }}" class="flex items-center bg-transparent text-gray-50 rounded font-semibold focus:outline-none px-4 py-4 hover:shadow-2xl transition ease-in-out duration-150">
                            <svg class="w-6 fill-current" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd" />
                            </svg>
                            <span class="ml-2">Play Trailer</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="movie-cast">
        <div class="container mx-auto px-4 py-16">
            <h2 class="capitalize text-white text-2xl font-semibold">Top Billed Cast</h2>
            <div class="grid lg:grid-cols-7 gap-8">
                @foreach ($movie['credits']['cast'] as $cast)
                    @if ($loop->index < 7)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $cast['profile_path'] }}" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg"/>
                            </a>
                            <div class="mt-2">
                                <a href="#" class="text-md pt-4 text-white font-semibold hover:text-yellow-500">{{ $cast['name'] }}</a>
                                <div class="text-sm text-gray-400">
                                    {{ $cast['character'] }}
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="movie-image">
        <div class="container mx-auto px-4 py-16">
            <h2 class="capitalize text-white text-2xl font-semibold">Image</h2>
            <div class="grid lg:grid-cols-4 gap-8">
                @foreach ($movie['images']['backdrops'] as $image)
                    @if ($loop->index < 8)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg"/>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="movie-recommendation">
        <div class="container mx-auto px-4 py-16">
            <h2 class="capitalize text-white text-2xl font-semibold">Recommendations</h2>
            <div class="grid lg:grid-cols-7 gap-8">
                @foreach ($movieRecommendations as $movie)
                    @if ($loop->index < 7)
                        <div class="mt-8">
                            <a href="{{ route('movie.show', $movie['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg"/>
                            </a>
                            <div class="mt-2">
                                <a href="{{ route('movie.show', $movie['id']) }}" class="text-md pt-4 text-white font-semibold hover:text-yellow-500">
                                    {{ $movie['title'] }}
                                </a>
                                <div class="flex items-center text-gray-400 text-sm">
                                    <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, y') }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection