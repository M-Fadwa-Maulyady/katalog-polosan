<x-layoutUser>

<link rel="stylesheet" href="{{ asset('tema/contact.css') }}">

<div class="contact-wrapper">

    <h2 class="contact-title">Contact <span>ME</span></h2>

    <div class="contact-container">

        {{-- LEFT FORM --}}
        <div class="left-panel">

            <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
                @csrf

                <div class="form-row">
                    <input type="text" name="name" class="input" placeholder="Enter Your Name" required>
                    <input type="email" name="email" class="input" placeholder="Enter Your Email" required>
                </div>

                <textarea name="message" class="textarea" placeholder="Enter Your Message" required></textarea>

                <button class="btn-kirim">Kirim</button>
            </form>

           @if(session('success'))
<div id="toast"
    style="
        position: fixed;
        top: 20px;
        right: 20px;
        background: #2b7a4b;
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        font-size: 14px;
        z-index: 9999;
        opacity: 0;
        transition: opacity 0.5s ease;
    ">
    ✔ {{ session('success') }}
</div>
<script>
    const toast = document.getElementById('toast');
    toast.style.opacity = "1";
    setTimeout(() => {
        toast.style.opacity = "0";
    }, 3000);
</script>
@endif


        </div>

        {{-- RIGHT PANEL QR --}}
        <div class="right-panel">
            <div class="qr-box">
                <p class="qr-title">WhatsApp Contact</p>

                <img src="{{ asset('tema/img/wa.jpg') }}" class="qr-image" alt="QR WhatsApp">

                <button class="btn-wa" id="btnWa">WhatsApp</button>
            </div>
        </div>

    </div>

</div>
<script>
    document.getElementById('btnWa').addEventListener('click', function () {
        const waUrl = "https://wa.me/6281328971485?text=Halo%20saya%20mau%20bertanya...";
        window.open(waUrl, "_blank");
    });
</script>

</x-layoutUser>
