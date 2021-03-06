<!-- Footer -->
<style>
    .btn-rounded{
        border-radius: 15px;
        padding: 8px;
    }
</style>
<footer class="page-footer mt-3  bg-secondary pt-4">

    <!-- Footer Elements -->
    <div class="container">

      <!-- Call to action -->
      <ul class="list-unstyled list-inline text-center py-2">
        <li class="list-inline-item">
          <h5 class="mb-1 text-white "> {{auth()->user()?'Start Shopping now':'Create your account and start Shopping now'}}  </h5>
        </li>
        @if (!auth()->user())
            <li class="list-inline-item">
                <a href="/login" class="btn btn-outline-warning text-white btn-rounded">{{__('messages.signUp')}}!</a>
            </li>
        @else
            <li class="list-inline-item">
              <a href="/products" class="btn btn-outline-warning text-white btn-rounded">{{__('messages.startShopping')}}</a>
            </li>
        @endif
      </ul>
      <!-- Call to action -->

    </div>
    <!-- Footer Elements -->

    <!-- Copyright -->
    <div class="footer-copyright text-light bg-dark text-center py-3">©  Copyright 2020 / <span id="currentYear"></span>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

  <script>
      const CurrentYear = new Date().getFullYear();
      document.getElementById('currentYear').innerHTML=CurrentYear;
  </script>
