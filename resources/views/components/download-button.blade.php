<div class="inline-block mt-2 md:mt-6">
    <a href="{{ route('download') }}" class="inline-flex items-center justify-center px-8 py-4 mx-auto font-extrabold transition duration-150 bg-green-800 border border-green-300 rounded-lg shadow-2xl lg:mx-0 w-76 text-white hover:bg-green-600 hover:-translate-y-1 shadow-black/50">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 mr-3 text-opacity-50 transform">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
        <span>@lang('Download') {{ App\Models\GameVersion::latest() ? App\Models\GameVersion::latest()->version : '0.0.0' }}<sup>&dagger;</sup></span>
    </a>
    <div class="mt-1 mb-2 text-xs text-white drop-shadow shadow-black">

        <span>@lang('Released') {{ App\Models\GameVersion::latest() ? (now()->subYear(1) > App\Models\GameVersion::latest()->release_date ? App\Models\GameVersion::latest()->release_date->isoFormat('LL') : App\Models\GameVersion::latest()->release_date->diffForHumans()) : 'Never' }}</span>
        <span class="px-2">&mdash;</span>
        <span><a href="https://wiki.pokemon3d.net/index.php/Pok%C3%A9mon_3D#Requirements" class="hover:text-slate-300"><sup>&dagger;</sup> @lang('Requirements apply')</a></span>
    </div>
</div>
