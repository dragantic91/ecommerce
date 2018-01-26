<footer class="footer-wrap">
    <div class="container f-menu-list">
        <div class="row">
            <div class="f-menu">
                <div class="companyinfo">
                    <a href="{{ route('home') }}">
                        <img src="/front/assets/img/logo-b.png">
                    </a>
                </div>
            </div>
            <div class="f-menu">
                <ul class="nav nav-pills nav-stacked">
                    <li>Montag - Freitag 13:00 - 18:00</li><br>
                    <li>Birmensdorferstr. 430<br>8055 Zürich<br>Tel +41 44 450 21 02</li>

                </ul>
            </div>
            <div class="f-menu">
                <h3>
                    Social Media
                </h3>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="https://de-de.facebook.com/schoengebraucht.ch/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i>Facebook</a></li>
                    <li><a href="https://www.instagram.com/schoengebraucht.ch/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i>Instagram</a></li>
                </ul>
            </div>

            <div class="f-subscribe">
                <h3>Newsletter abonnieren</h3>
                <form method="post" action="{{ route('subscribe') }}" class="f-subscribe-form">
                    {{ csrf_field() }}
                    <input placeholder="Ihre Email" type="email" name="email" required>
                    <button type="submit"><i class="fa fa-paper-plane"></i></button>
                </form>
                <p>Geben Sie Ihre Emailadresse ein, wenn Sie unseren Newsletter erhalten möchten. Abonnieren Sie jetzt!</p>
            </div>
        </div>
    </div>
</footer>