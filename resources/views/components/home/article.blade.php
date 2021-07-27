<div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
        <a href="#" class="flex flex-wrap no-underline hover:no-underline">
            <p class="w-full text-gray-600 text-xs md:text-sm px-6 mt-6 uppercase">
                <span class="text-green-700">Game</span> &mdash; {{ now()->format('F j, Y') }}
            </p>
            <div class="w-full font-bold text-xl text-gray-800 px-6">
                Game Jolt Login Issues
            </div>
            <p class="text-gray-600 text-base px-6 mb-5">
                We are currently experiencing some issues with linking the Pokémon3D game to Gamejolt, causing players not being able to login to their online account. This is currently being worked on and once fixed will be linked back to you all! Our excuses for the inconvenience and thank you for your patience!
            </p>
        </a>
    </div>
    <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow px-6">
        <div class="flex items-center justify-start">
            <button
                class="mx-auto lg:mx-0 bg-green-800 text-green-50 font-extrabold my-6 py-2 px-4 rounded-lg shadow-lg">
                Read more <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                  </svg>
            </button>
        </div>
    </div>
</div>