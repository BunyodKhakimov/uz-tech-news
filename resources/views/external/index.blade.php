@extends('layouts.main')

@section('title', 'Api News')

<!-- Minipost -->

@section('miniposts')

    <section>
        <div class="mini-posts">
            @for($i=3; $i<=6; $i++)
                <article class="mini-post">
                    <header>
                        <h3><a href="{{ $posts[$i]['url'] }}">{{ $posts[$i]['title'] }}</a></h3>
                        <time class="published" datetime="2015-10-20">
                            {{ date('F j, Y', strtotime($posts[$i]['publishedAt']))}}
                        </time>
                        <a class="author"><img src="{{ asset('images/profile.png') }}" alt="" /></a>
                    </header>
                    <a href="{{ $posts[$i]['url'] }}" class="image">
                        <img
                            @if(isset($posts[$i]['urlToImage']))
                            src="{{ $posts[$i]['urlToImage'] }}"
                            @else src="{{ asset('images/pic15.jpg') }}"
                            @endif
                            alt="post_image" />
                    </a>
                </article>
            @endfor
        </div>
    </section>

@endsection

<!-- Postlist -->

@section('postlist')

    <section>
        <ul class="posts">
            @for($i=7; $i<=9; $i++)
                <li>
                    <article>
                        <header>
                            <h3>
                                <a href="{{ $posts[$i]['url'] }}">
                                    {{ $posts[$i]['title'] }}
                                </a>
                            </h3>
                            <time class="published" datetime="2015-10-20">
                                {{ date('F j, Y', strtotime($posts[$i]['publishedAt']))}}
                            </time>
                        </header>
                        <a href="{{ $posts[$i]['url'] }}" class="image img-container">
                            <img src="{{ asset('images/pic18.jpg') }}" alt="" />
                        </a>
                    </article>
                </li>
            @endfor
        </ul>
    </section>

@endsection

<!-- Posts -->

@section('content')

    @for($i=0; $i<=2; $i++)
        <article class="post">
            <header>
                <div class="title">
                    <h3>{{ $posts[$i]['title'] }}</h3>
                    <span class="badge badge-secondary text-capitalize">
                        TechCrunch
                    </span>
                </div>
                <div class="meta">
                    <time class="published" datetime="2015-10-18">
                        {{ date('F j, Y', strtotime($posts[$i]['publishedAt']))}}
                    </time>
                    <a class="author">
                        <span class="name">{{ $posts[$i]['author'] }}</span><img src="{{ asset('images/profile.png') }}" alt="" />
                    </a>
                    <span class="badge badge-secondary text-capitalize">
						Author
					</span>
                </div>
            </header>

            <a href="{{$posts[$i]['url']}}" class="image featured">
                <img
                    @if(isset($posts[$i]['urlToImage'])) src="{{ $posts[$i]['urlToImage'] }}"
                    @else src="{{ asset('images/pic15.jpg') }}"
                    @endif
                    alt="post_image" />
            </a>
            <p>
                {{$posts[$i]['description']}}
            </p>

            <footer>
                <ul class="actions">
                    <li>
                        <a href="{{ $posts[$i]['url'] }}" class="button big">
                            @lang('button.continue')
                        </a>
                    </li>
                </ul>
                <ul class="stats">
                    <li>
                        <a>TechCrunch</a>
                    </li>
                    <li>
                        <a>External</a>
                    </li>
                </ul>
            </footer>
        </article>
    @endfor

@endsection
