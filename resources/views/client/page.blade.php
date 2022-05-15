<x-landing-layout title="{{$page->title}}"
                  description="{{$page->description}}"
                  keywords="{{$page->keywords}}"
                  pageUrl="{{route('single.page.show',$page->slug)}}">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 shadow-lg">
                <article class="page mt-3">
                    {!! $page->content !!}
                </article>
            </div>
        </div>
    </div>
</x-landing-layout>
