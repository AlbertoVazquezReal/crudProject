<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
    <x-nav-link :href="route('leads.index')" :active="request()->routeIs('leads.index')">
        {{ __('Leads') }}
    </x-nav-link>
</div>