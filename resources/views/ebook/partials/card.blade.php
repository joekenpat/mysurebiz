<div class="col-6 col-md-4 col-xl-3 col-small-12 pb-3">
    <div class="course-cards position-relative" style="height: 100%;">
        <div class="card-head mb-1">
            {{--<div class="float-left">Lessons: {{ 1 }}</div>--}}
            <div class="float-right"
                 style="background-color: #cecbcb; padding: 0.2rem 0.4rem;
                 border-radius: 10px;">
                &#8358; {{ number_format($ebook->price) }}
            </div>
        </div>
        <div class="img-wrapper text-center position-relative">
            <img class="img-fluid" src="{{$ebook->cover_image}}" alt="">
        </div>
        <div class="title text-center my-1">
            <a href="{{ route('ebook', ['ebook_id' => $ebook->id]) }}">
                {{ str_limit($ebook->title, 35)}}
            </a></div>
        <div class="actions mt-2">
            <a href="{{ route('ebook', ['ebook_id' => $ebook->id]) }}"
               class="float-left my-button-gray"
            style="font-size: 0.8rem;">View
            </a>

            <a href="{{ route('ebook-checkout', ['ebook-id' => $ebook->id]) }}"
               class="float-right my-button-green">Buy
            </a>
        </div>
    </div>
</div>