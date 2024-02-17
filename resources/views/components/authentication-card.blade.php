    <div class="grid md:grid-cols-8 font-sans text-gray-900 dark:text-gray-100 antialiased dark:bg-firefly-900 overflow-x-hidden">

        <div id="login-image"
            class="hidden sm:flex items-center justify-center md:col-span-5 bg-cover bg-no-repeat bg-center"
            style="background-image: url('{{ asset('images/main/HGradient.jpg') }}'); background-position: center;
        background-repeat: no-repeat;
        background-size: cover; ">
            <div>
                {{ $logo }}
            </div>

        </div>
        <div
            class="bg-gray-100 block dark:bg-gray-950 h-dvh md:col-span-3 pt-20 px-3">
            <div
                class="mt-6 overflow-hidden px-3 py-4 rounded-2xl sm:max-w-md w-full">
                {{ $slot }}
            </div>
        </div>
    </div>


    {{-- <script>
    document.addEventListener('DOMContentLoaded', () => {

        async function fetchUnsplashImage() {
            const apiKey = "{{ env('UNSPLASH_KEY') }}";

            try {
                const response = await fetch(`https://api.unsplash.com/photos/random?client_id=${apiKey}`);
                const data = await response.json();
                return data.urls.regular;

            } catch (error) {
                console.error('Error fetching image:', error);
                throw error; // Re-throw for handling in the main function
            }
        }

        fetchUnsplashImage()
            .then(imageUrl => {
                const loginImage = document.getElementById('login-image');
                loginImage.style.backgroundImage = `url(${imageUrl})`;
            })
            .catch(error => {
                console.log("whew.....");
                console.error('Error setting background image:', error);
                // Handle errors gracefully, e.g., display a placeholder image
            });
    });
</script> --}}
