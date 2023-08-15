@if (is_array($breadcrumbs))
    <nav class="flex px-5 py-3 mb-6 text-slate-700 border border-slate-200 rounded-lg bg-slate-50 dark:bg-slate-900 dark:border-slate-700">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="/" class="inline-flex items-center text-sm text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    {{ __('Home') }}
                </a>
            </li>
            @foreach ($breadcrumbs as $crumb)
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-slate-300 dark:text-slate-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        @if(isset($crumb["url"]))
                            <a href="{{ $crumb["url"] }}" class="ml-1 text-sm font-medium text-slate-600 hover:text-slate-900 md:ml-2 dark:text-slate-400 dark:hover:text-white">{{ $crumb["label"] }}</a>
                        @else
                            <span class="ml-1 text-sm font-medium text-slate-400 md:ml-2 dark:text-slate-500">{{ $crumb["label"] }}</span>
                        @endif
                    </div>
                </li>
            @endforeach
        </ol>
    </nav>
@endif
