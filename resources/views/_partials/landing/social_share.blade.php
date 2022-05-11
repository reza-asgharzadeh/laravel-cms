<div class="d-flex justify-content-center">
    <div class="mx-3">
        <a href="https://t.me/share/url?url={{$post->slug ?? $course->slug}}&text={{$post->title ?? $course->name}}"><i class="fa fa-2x fa-telegram telegram-txt-color"></i></a>
    </div>
    <div class="mx-3">
        <a href="whatsapp://send/?text={{$post->title ?? $course->name}}%20{{$post->slug ?? $course->name}}"><i class="fa fa-2x fa-whatsapp whatsapp-txt-color"></i></a>
    </div>
    <div class="mx-3">
        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{$post->slug ?? $course->slug}}"><i class="fa fa-2x fa-linkedin linkedin-txt-color"></i></a>
    </div>
    <div class="mx-3">
        <a href="https://twitter.com/intent/tweet?url={{$post->slug ?? $course->slug}}&text={{$post->title ?? $course->name}}"><i class="fa fa-2x fa-twitter twitter-txt-color"></i></a>
    </div>
</div>
