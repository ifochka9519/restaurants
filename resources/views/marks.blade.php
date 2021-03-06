@extends('layouts.site')
@section('title')
    Marks
@endsection

@section('content')
    <div class="row">
        <section  id="pinBoot">
            @foreach($marks as $mark)
                <article class="white-panel">
                    <h4>
                        <a href="{{route('view_restaurant',['id'=>$mark->restaurant->id])}}">
                            {!! $mark->restaurant->name !!}
                        </a>
                    </h4>
                    <hr />
                    <p>
                        {{$mark->restaurant->short_description}}
                    </p>
                    <hr />
                    <p>Ваша оцінка:
                        <span class="badge">
                            {{@round($mark->mark,2) }}
                        </span>
                        <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    </p>

                </article>
            @endforeach
        </section>
    </div>
@endsection