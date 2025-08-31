<section class="bg-purple-light h-[calc(100vh-120px)] max-lg:h-auto bottom-border">
    {{-- container --}}

    {{-- @dd($heroSections['titles']) --}}
    <div class="container-1140 h-full py-28 max-lg:py-20 flex items-center justify-between gap-20 max-lg:flex-col">
        <!-- Content Wrapper -->
        <div class="max-w-[580px] space-y-8">
            <!-- Text Wrapper -->

            <x-ui.header-section title="Hello!" class="max-lg:mx-auto" />


            <div class="leading-14 max-lg:text-center">
                @if (!empty($heroSections['titles']))
                    @foreach ($heroSections['titles'] as $title)
                        <h1 class="font-bold text-gray-900 mb-2 font-cabinet text-[62px] max-lg:text-[44px]">
                            {{ $title }}
                        </h1>
                    @endforeach
                @endif
            </div>


            <div class="max-lg:text-center">
                @if (!empty($heroSections['descriptions']))
                    @foreach ($heroSections['descriptions'] as $description)
                        <p class="text-2xl max-lg:text-xl text-gray-700 max-w-xl font-dm-sans">{{ $description }}</p>
                    @endforeach
                @endif
            </div>

            <!-- Call to Action Button -->
            <x-ui.button-link title="See My Works" href="/#portfolio" classDiv="max-lg:mx-auto" />

        </div>

        {{-- Hero Image --}}
        <img width="465" height="550" src="/storage/{{ $heroSections['imagePath'] ?? '/' }}" alt="banner"
            class="rounded-t-full full-border h-full min-h-96 object-cover" />


    </div>
</section>
