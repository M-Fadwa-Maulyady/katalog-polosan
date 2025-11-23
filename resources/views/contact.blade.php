<x-layoutUser>

<link rel="stylesheet" href="{{ asset('tema/contact.css') }}">

<div class="contact-wrapper">

    <h2 class="contact-title">Contact <span>ME</span></h2>

    <div class="contact-container">

        {{-- LEFT FORM --}}
        <div class="left-panel">

            <form action="#" method="POST" class="contact-form">
                @csrf

                <div class="form-row">
                    <input type="text" class="input" placeholder="Enter Your Name" required>
                    <input type="email" class="input" placeholder="Enter Your Email" required>
                </div>

                <textarea class="textarea" placeholder="Enter Your Message" required></textarea>

                <button class="btn-kirim">Kirim</button>
            </form>

        </div>

        {{-- RIGHT PANEL QR --}}
        <div class="right-panel">
            <div class="qr-box">
                <p class="qr-title">WhatsApp Contact</p>

                <img src="{{ asset('tema/img/wa.jpg') }}" class="qr-image" alt="QR WhatsApp">

                <button class="btn-wa">WhatsApp</button>
            </div>
        </div>

    </div>

</div>

</x-layoutUser>
