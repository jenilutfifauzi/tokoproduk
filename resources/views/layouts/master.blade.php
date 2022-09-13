      @includeIf('layouts.header')
      @includeIf('layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('title-header')</h1>
          </div>

          <div class="section-body">
            @yield('content')
          </div>
        </section>
      </div>

      @includeIf('layouts.footer')
      @stack('scripts')

</body>
</html>
