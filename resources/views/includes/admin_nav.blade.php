    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">




{{-- Admin Top Navigation --}}
@include('includes.admin_top_nav')

{{-- Admin Side Navigation --}}

@if ( Auth::user()->isAdmin() )

    @include('includes.admin_side_nav')

  
        </nav>

@endif

