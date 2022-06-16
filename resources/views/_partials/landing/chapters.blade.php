<div class="custom-box-shadow p-3">
    <div class="h5 text-sky mb-2">سرفصل‌ها:</div>
    <div class="accordion" id="accordionExample">
        @forelse($course->chapters as $chapter)
            <div class="accordion-item mb-2 border-0">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed bg-sky rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#chapter{{$loop->iteration}}" aria-expanded="false" aria-controls="collapseTwo">
                        {{$chapter->name}}
                    </button>
                </h2>
                <div id="chapter{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    @forelse($chapter->episodes as $episode)
                        <div class="accordion-body bg-light">
                            <div class="d-flex">
                                <div class="p-2"><span class="circle-number">{{$loop->iteration}}</span> {{$episode->name}}</div>
                                <div class="ms-auto p-2">{{$episode->time}} دقیقه</div>
                                <div class="btn-video"><small><a href="{{route('episodes.show',[$episode->chapter->course->slug,$episode->slug])}}" target="_blank"><i class="fa fa-eye"></i> مشاهده و دانلود</a></small></div>
                            </div>
                        </div>
                    @empty
                        <div class="accordion-body">
                            <div class="alert alert-primary" role="alert">در حال حاضر جلسه‌ای برای این فصل ایجاد نشده است.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        @empty
            <div class="alert alert-primary" role="alert">در حال حاضر سرفصلی برای این دوره ایجاد نشده است.</div>
        @endforelse
    </div>
</div>
