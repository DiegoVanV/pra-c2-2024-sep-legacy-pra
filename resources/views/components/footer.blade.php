<footer>
    <!-- Blokje "Over ons" -->
    <div class="footer-section">
        <h3>Over ons</h3>
        <p>Wij zijn een toonaangevend bedrijf in de [industrie] met jarenlange ervaring in het leveren van kwalitatieve producten en diensten.</p>
    </div>

    <!-- Contactgegevens -->
    <div class="footer-section">
        <h3>Contactgegevens</h3>
        <ul>
            <li>Adres: Straatnaam 123, 1000 AA, Plaatsnaam</li>
            <li>Email: info@bedrijf.nl</li>
            <li>Telefoon: 0123-456789</li>
            <a class="contact-link" href="{{ url('/contact') }}" title="{{ __('misc.contact_alt') }}">{{ __('Contact') }}</a>
        </ul>
    </div>

    <!-- Social links -->
    <div class="footer-section">
        <h3>Volg ons</h3>
        <ul>
            <li><a href="#">Facebook</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">LinkedIn</a></li>
            <li><a href="#">Instagram</a></li>
        </ul>
    </div>

    <!-- Copyright -->
    <div>
        © {{ __('misc.copyright') }}
    </div>
</footer>

<!-- analytics code -->
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30506707-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
<!-- Einde analytics code -->

<script language="Javascript" type="text/javascript">
 if (top.location!= self.location) {
  top.location = self.location.href
 }
</script>

<style>
/* Simpele stijlen voor de footer-secties */
.footer-section {
    margin-bottom: 20px;
    align-items: center;
    text-align: center;
}

.footer-section h3 {
    margin-bottom: 10px;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 5px;
}
</style>
