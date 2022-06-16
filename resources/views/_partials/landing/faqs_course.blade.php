<div class="custom-box-shadow p-3 mt-5">
    <div class="h5 text-pink mb-2">سوالات متداول:</div>
    <div class="accordion" id="accordionExample">
        @forelse($course->fagCourses as $fagCourse)
            <div class="accordion-item mb-2 border-0">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed bg-pink rounded-4" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{$loop->iteration}}" aria-expanded="false" aria-controls="collapseTwo">
                        {{$fagCourse->question}}
                    </button>
                </h2>
                <div id="faq{{$loop->iteration}}" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="d-flex">
                            <div class="p-2">{{$fagCourse->answer}}</div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-danger" role="alert">در حال حاضر سوال متداولی برای این دوره ایجاد نشده است.</div>
        @endforelse
    </div>
</div>
