<footer class="footer-distributed">
    <div class="footer-left">
        <a href="/home" >           
            <img alt="Kuijpers Logo" src="{{ asset('img/logo_wiz2.png') }}" class="img-fluid" id="wizlogofooter">
        </a>
        <p class="footer-links">
            <a href="/home" aria-label="Home" class="footernavhover">Home</a>
            ·
            <a href="/overons" aria-label="Over ons" class="footernavhover">Over Ons</a>       
            ·
            <a href="/overzicht" aria-label="Overzicht " class="footernavhover">Overzicht</a>
            ·
            <a href="/profiel" aria-label="Profiel" class="footernavhover">Profiel</a>
            ·
            <a href="https://www.kuijpers.nl/" aria-label="Mijn Kuijpers" target="blank" class="footernavhover" rel="noreferrer">Mijn Kuijpers</a>
        </p>
        <p aria-label="Kuijpers Installaties" class="footer-company-name">Kuijpers Installaties &copy; {{ date('Y') }}</p>
    </div>
    <div class="footer-center">
        <div>
            <i class="fas fa-map-marker-alt"></i>
            <a  target="blank" aria-label="Locatie" href="https://www.google.nl/maps/place/Panovenweg+20,+5708+HR+Helmond/@51.4738781,5.6267348,17z/data=!3m1!4b1!4m5!3m4!1s0x47c7214f44307933:0x16bd59b2e5452121!8m2!3d51.4738748!4d5.6289235" rel="noopener">
                <p><span>Panovenweg 18</span> Helmond, Nederland</p>
            </a>
        </div>
        <div>
            <i class="fas fa-phone"></i>
            <p>0900 20 50 800</p>
        </div>
        <div>
            <i class="fas fa-envelope"></i>
            <p><a href="mailto:shopkuijpers@gmail.com" aria-label="Email">shopkuijpers@gmail.com</a></p>
        </div>
    </div>
    <div class="footer-right">
        @yield('PWA')
        <div class="footer-icons">
            <a href="https://www.facebook.com/kuijpersNL/" aria-label="Facebook" target="blank"><i class="fab fa-facebook-f"></i></a>
            <a href="https://twitter.com/kuijpersnl" aria-label="Twitter" target="blank"><i class="fab fa-twitter"></i></a>
            <a href="https://www.youtube.com/user/KuijpersNL" aria-label="Youtube" target="blank"><i class="fab fa-youtube"></i></a>
            <a href="https://nl.linkedin.com/company/kuijpers-installaties" aria-label="LinkedIn" target="blank"><i class="fab fa-linkedin-in"></i></a>
            <a href="https://www.instagram.com/kuijpersnl/" aria-label="Instagram"target="blank"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="footer-logoff profilepage socialiconhover">  
            <a class="fas fa-power-off loggouthover" aria-label="Uitloggen" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <p class="uitloggenfootertext">Uitloggen</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>

    </div>
</footer>