@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif
    @if(Route::is('command_center') )
    <a href="/"
        @if($layoutHelper->isLayoutTopnavEnabled())
            class="navbar-brand bg-primary {{ config('adminlte.classes_brand') }}"
        @else
            class="brand-link bg-white{{ config('adminlte.classes_brand') }}"
        @endif>

        {{-- Small brand logo --}}
        {{-- <img src="{{ asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}"
            alt="{{ config('adminlte.logo_img_alt', 'AdminLTE') }}"
            class="{{ config('adminlte.logo_img_class', 'brand-image img-circle elevation-3') }}"
            style="opacity:.8"> --}}
            <div class="text-center "> 
                <img class="brand-text text" src="{{ asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}" height="39">
            </div>
                

        {{-- Brand text --}}
        {{-- <span class="brand-text font-weight-light {{ config('adminlte.classes_brand_text') }}">
            {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
        </span> --}}

    </a>
    @else
    <a href="{{ $dashboard_url }}"
        @if($layoutHelper->isLayoutTopnavEnabled())
            class="navbar-brand bg-primary {{ config('adminlte.classes_brand') }}"
        @else
            class="brand-link bg-white{{ config('adminlte.classes_brand') }}"
        @endif>

        {{-- Small brand logo --}}
        {{-- <img src="{{ asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}"
            alt="{{ config('adminlte.logo_img_alt', 'AdminLTE') }}"
            class="{{ config('adminlte.logo_img_class', 'brand-image img-circle elevation-3') }}"
            style="opacity:.8"> --}}
            <div class="text-center "> 
                <img class="brand-text text" src="{{ asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}" height="39">
            </div>
                

        {{-- Brand text --}}
        {{-- <span class="brand-text font-weight-light {{ config('adminlte.classes_brand_text') }}">
            {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}
        </span> --}}

    </a>
    @endif

