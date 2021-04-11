@extends('layout.app')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movie">
            <h2 class="capitalize text-white text-lg font-semibold">Popular Movie</h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-8 gap-3">
                @foreach ($popularMovie as $movie)
                    @if ($loop->index < 16)
                        <div class="mt-8 relative">
                            <a href="{{ route('movie.show', $movie['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg"/>
                            </a>
                            <span class="ml-3 mt-3 border-2 border-yellow-500 rounded-full w-8 h-8 text-center absolute top-0 left-0 text-white font-semibold text-sm flex justify-center items-center">
                                {{ $movie['vote_average'] * 10 }} <small class="text-xs">%</small>
                            </span>
                            <div class="mt-2">
                                <a href="{{ route('movie.show', $movie['id']) }}" class="text-md pt-4 text-white font-semibold hover:text-yellow-500">{{ $movie['title'] }}</a>
                                <div class="flex items-center text-gray-400 text-sm">
                                    <span>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, y') }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>                  
        </div>

        <div class="popular-movie pb-10">
            <h2 class="capitalize text-white text-lg font-semibold">Upcoming Movie</h2>
            <div class="grid grid-cols-2 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-8 gap-3">
                @foreach ($upcomingMovie as $movie)
                    @if ($loop->index < 16)
                        <div class="mt-8 relative">
                            <a href="{{ route('movie.show', $movie['id']) }}">
                                <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'] }}" class="hover:opacity-50 transition ease-in-out duration-150 rounded-lg"/>
                            </a>
                            <span class="ml-3 mt-3 border-2 border-yellow-500 rounded-full w-8 h-8 text-center absolute top-0 left-0 text-white font-semibold text-sm flex justify-center items-center">
                                {{ $movie['vote_average'] * 10 }} <small class="text-xs">%</small>
                            </span>
                            <div class="mt-2">
                                <a href="{{ route('movie.show', $movie['id']) }}" class="text-md pt-4 text-white font-semibold hover:text-yellow-500">{{ $movie['title'] }}</a>
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