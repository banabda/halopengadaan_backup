<!DOCTYPE html>
<html lang="id-ID">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Lupa Sandi &lsaquo; &#8212; WordPress</title>
    <link rel='dns-prefetch' href='//s.w.org' />
    <link rel='stylesheet' id='dashicons-css'
        href='http://www.sit-mashlahiyah.sch.id/wp-includes/css/dashicons.min.css?ver=5.6' type='text/css'
        media='all' />
    <link rel='stylesheet' id='buttons-css'
        href='http://www.sit-mashlahiyah.sch.id/wp-includes/css/buttons.min.css?ver=5.6' type='text/css' media='all' />
    <link rel='stylesheet' id='forms-css' href='http://www.sit-mashlahiyah.sch.id/wp-admin/css/forms.min.css?ver=5.6'
        type='text/css' media='all' />
    <link rel='stylesheet' id='l10n-css' href='http://www.sit-mashlahiyah.sch.id/wp-admin/css/l10n.min.css?ver=5.6'
        type='text/css' media='all' />
    <link rel='stylesheet' id='login-css' href='http://www.sit-mashlahiyah.sch.id/wp-admin/css/login.min.css?ver=5.6'
        type='text/css' media='all' />
    <meta name='robots' content='noindex,noarchive' />
    <meta name='referrer' content='strict-origin-when-cross-origin' />
    <meta name="viewport" content="width=device-width" />
    <link rel="icon"
        href="http://www.sit-mashlahiyah.sch.id/wp-content/uploads/2020/12/cropped-1609213901602-2-32x32.png"
        sizes="32x32" />
    <link rel="icon"
        href="http://www.sit-mashlahiyah.sch.id/wp-content/uploads/2020/12/cropped-1609213901602-2-192x192.png"
        sizes="192x192" />
    <link rel="apple-touch-icon"
        href="http://www.sit-mashlahiyah.sch.id/wp-content/uploads/2020/12/cropped-1609213901602-2-180x180.png" />
    <meta name="msapplication-TileImage"
        content="http://www.sit-mashlahiyah.sch.id/wp-content/uploads/2020/12/cropped-1609213901602-2-270x270.png" />
</head>

<body class="login no-js login-action-lostpassword wp-core-ui  locale-id-id">
    <script type="text/javascript">
        document.body.className = document.body.className.replace('no-js', 'js');

    </script>
    <div id="login">
        <h1><a href="https://wordpress.org/">Diberdayakan dengan WordPress</a></h1>
        <p class="message">Silakan masukkan nama pengguna atau alamat e-mail Anda. Anda akan menerima pesan e-mail
            dengan instruksi tentang cara mengatur ulang kata sandi Anda.</p>

        <form name="lostpasswordform" id="lostpasswordform">
            <p>
                <label for="user_login">Nama Pengguna atau Alamat Email</label>
                <input type="text" name="user_login" id="user_login" class="input" value="" size="20"
                    autocapitalize="off" />
            </p>
            <input type="hidden" name="redirect_to" value="" />
            <p class="submit">
                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large"
                    value="Dapatkan Sandi Baru" />
            </p>
        </form>

        <p id="nav">
            <a href="{{ url('wp-admin') }}">Masuk</a>
        </p>
        <p id="backtoblog"><a href="{{ url('/') }}">
                &larr; Pergi ke </a></p>
    </div>
    <script type="text/javascript">
        try {
            document.getElementById('user_login').focus();
        } catch (e) {}
        if (typeof wpOnload == 'function') wpOnload();

    </script>
    <div class="clear"></div>
</body>

</html>
