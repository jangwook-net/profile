<section class="about-section" id="about">
    @include('components.section-title', [ 'title' => 'Who I am?' ])
    <div class="pure-g" style="display: -webkit-box">
        <div class="pure-u-md-1-3 pure-u-sm-1-1">
            <div class="title">Profile</div>
            <img src="{{ asset('images/iam.JPG') }}" class="about-img">
            <p>
                I'm Korean and living in Japan.<br>
                I like spending my time to my level up.<br>
                Some of coffee and highball is my happiness.
            </p>
        </div>
        <div class="pure-u-md-1-3 pure-u-sm-1-1">
            <div class="title">Skills</div>
            <table class="ta_center">
                <tr>
                    <th>PHP - Laravel</th>
                    <td>Can create any type of web site as scratch.</td>
                </tr>
                <tr>
                    <th>Node.js & Javascript</th>
                    <td>Can create any type of web site as scratch.</td>
                </tr>
                <tr>
                    <th>Vue.js & Nuxt.js</th>
                    <td>Can create SSR & SPA web site.</td>
                </tr>
                <tr>
                    <th>AWS</th>
                    <td>Can make traditional server & server-less environments.</td>
                </tr>
                <tr>
                    <th>Docker</th>
                    <td>Can use docker under the develop environment.</td>
                </tr>
                <tr>
                    <th>GCP</th>
                    <td>Recently start studying.</td>
                </tr>
                <tr>
                    <th>Ionic</th>
                    <td>Recently start studying.</td>
                </tr>
                <tr>
                    <th>Korean & Japanese</th>
                    <td>Can use these language in the business field.</td>
                </tr>
            </table>
        </div>
        <div class="pure-u-md-1-3 pure-u-sm-1-1">
            <div class="title">Characteristics</div>
            <div id="chartjs-radar">
                <canvas id="canvas"></canvas>
            </div>
        </div>
    </div>
</section>
