<section class="py-38 px-30 max-lg:px-0 bottom-border bg-white">
    <div class="container-1140 space-y-8">

        {{-- header section --}}
        <div class="max-w-3xl text-center mx-auto space-y-8">
            <x-ui.header-section title="My Services!" class="mx-auto" />

            <h1 class="text-5xl max-lg:text-3xl text-black-light font-cabinet font-bold -tracking-tighter">
                The service I offer is specifically designed to meet your needs.
            </h1>
        </div>

        {{-- cards servieces --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-30">
            <!-- card 1 -->
            <div
                class="rounded-[20px] full-border bg-purple-light p-30 flex items-start max-lg:flex-col gap-4 shadow-sm">
                <div class="rounded-full full-border bg-white w-16 h-16 flex items-center justify-center">
                    <svg class="w-7 h-7 text-gray-900" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M12 6v12m6-6H6" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-2xl font-bold text-gray-900 font-cabinet">Strategy &amp; Planning</h3>
                    <p class="text-lg text-gray-700 font-dm-sans">
                        Streamline your campaigns with tools that improve engagement, boost visibility, and help you
                        connect
                        with your audience.
                    </p>
                </div>
            </div>

            <!-- card 2 -->
            <div
                class="rounded-[20px] full-border bg-green-light p-30 flex items-start max-lg:flex-col gap-4 shadow-sm">
                <div class="rounded-full full-border bg-white w-16 h-16 flex items-center justify-center">
                    <svg class="w-7 h-7 text-gray-900" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <circle cx="11" cy="11" r="7" />
                        <line x1="21" y1="21" x2="16.65" y2="16.65" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-2xl font-bold text-gray-900 font-cabinet">User Research</h3>
                    <p class="text-lg text-gray-700 font-dm-sans">
                        Simplify project workflows with organized tools and strategies designed to keep your team
                        aligned
                        and
                        your goals on track.
                    </p>
                </div>
            </div>

            <!-- card 3 -->
            <div class="rounded-[20px] full-border bg-pink-light p-30 flex items-start max-lg:flex-col gap-4 shadow-sm">
                <div class="rounded-full full-border bg-white w-16 h-16 flex items-center justify-center">
                    <svg class="w-7 h-7 text-gray-900" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <rect x="4" y="4" width="16" height="16" rx="2" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-2xl font-bold text-gray-900 font-cabinet">Web Design</h3>
                    <p class="text-lg text-gray-700 font-dm-sans">
                        Gain valuable insights into user behavior, website performance, and key business metrics to
                        optimize
                        your digital presence.
                    </p>
                </div>
            </div>

            <!-- card 4 -->
            <div
                class="rounded-[20px] full-border bg-purple-light-secoundary p-30 flex items-start max-lg:flex-col gap-4 shadow-sm">
                <div class="rounded-full full-border bg-white w-16 h-16 flex items-center justify-center">
                    <svg class="w-7 h-7 text-gray-900" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 17.27L18.18 21 16.54 13.97 22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" />
                    </svg>
                </div>
                <div class="flex-1">
                    <h3 class="text-2xl font-bold text-gray-900 font-cabinet">Brand Design</h3>
                    <p class="text-lg text-gray-700 font-dm-sans">
                        Understand your market with precise data analysis and deep customer insights that guide your
                        decision-making processes.
                    </p>
                </div>
            </div>
        </div>

        {{-- butoon section link --}}

        <x-ui.button-link title="Check Portfolio" classDiv="mx-auto" />
    </div>
</section>
