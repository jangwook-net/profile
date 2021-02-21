<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Jangwook's Profile</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="antialiased">
        @if (session('contact_result'))
            <div class="contact-result" onclick="this.remove()">{{ session('contact_result') }}</div>
        @endif

        <section class="main-visual-section">
            Welcome!<br>
            Hi, I’m <span class="color-main">{{ $name }}</span>.<br>
            If you want to know about me,<br>
            Click the below button!<br>

            <button class="btn-go-to-who-i-am">Who I am?</button>
        </section>

        <section class="contact-section">
            <div class="section-title">Contact</div>

            @foreach ($errors->all() as $message)
                <div class="error-msg">{{ $message }}</div>
            @endforeach

            <form action="/contact" method="post" class="contact-form">
                @csrf
                <table>
                    <tr>
                        <th>Name</th>
                        <td><input type="text" name="name" placeholder="Name" required></td>
                    </tr>
                    <tr>
                        <th>E-mail Address</th>
                        <td><input type="email" name="email" placeholder="E-mail Address" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <textarea name="contents" rows="10" placeholder="Input messages." required></textarea>
                        </td>
                    </tr>
                </table>
                <button type="submit">Send</button>
            </form>
        </section>
    </body>
</html>
