<section class="contact-section">
    @include('components.section-title', [ 'title' => 'Contact' ])
    <div class="pure-g">
        <div class="pure-u-1-1">
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
        </div>
    </div>
</section>
