<div>
    <div id="recommended-topics-box">
        <h3 class="text-lg font-semibold text-gray-900 mb-3">Argomenti raccomandati</h3>
        <div class="topics flex flex-wrap justify-start gap-3">
            @foreach ($categories as $category)
                <a href="#"
                    class="bg-gray-600 
                            text-white
                            rounded-xl px-4 py-1 text-base">
                    {{ $category->name }}</a>
            @endforeach
        </div>
    </div>
</div>
