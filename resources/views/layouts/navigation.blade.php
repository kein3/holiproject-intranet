<aside class="bg-white border-r border-gray-100 w-64 min-h-screen" x-data="{ open: false }">
    <div class="p-4">
        <div class="flex items-center justify-center">
            <a href="{{ route('dashboard') }}">
                <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
            </a>
        </div>
        <nav class="mt-6 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('intranet')" :active="request()->routeIs('intranet')">
                {{ __('Intranet') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact.create')" :active="request()->routeIs('contact.create')">
                {{ __('Contact') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                {{ __('Mon Profil') }}
            </x-responsive-nav-link>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </nav>
    </div>
</aside>
