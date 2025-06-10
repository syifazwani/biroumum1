<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Galeri Foto & Video</title>
  @vite(['resources/css/app.css'])
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-blue-50 text-gray-800 font-sans">

  @include('partials.navbar')

  <h1 class="text-center text-2xl font-bold m-6">Galeri Biro Umum dan ASD</h1>



  <!-- Video View -->
<div id="video" class="tab-content">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 p-6 gap-5 mt-6">
    @foreach ($videos as $video)
      <video
        src="{{ asset('vid/' . $video->video_url) }}"
        controls
        class="w-full rounded-lg object-cover"
        preload="metadata"
      >
        Your browser does not support the video tag.
      </video>
    @endforeach
  </div>
</div>


  @include('partials.footer')

  <!-- Script -->
  <script>
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    const backBtn = document.getElementById('backBtn');

    tabButtons.forEach(btn => {
      btn.addEventListener('click', () => {
        // Aktifkan tombol yang ditekan dan nonaktifkan lainnya
        tabButtons.forEach(b => b.classList.remove('bg-cyan-500', 'active'));
        btn.classList.add('bg-cyan-500', 'active');

        // Tampilkan konten tab sesuai yang dipilih
        tabContents.forEach(c => c.classList.add('hidden'));
        document.getElementById(btn.dataset.tab).classList.remove('hidden');

        // Tutup album jika sebelumnya sedang dibuka
        closeAlbum();
      });
    });

    function openAlbum(albumId) {
      document.getElementById('albumGrid').classList.add('hidden');
      backBtn.classList.remove('hidden');
      document.querySelectorAll('.media-grid').forEach(g => g.classList.add('hidden'));
      document.getElementById(albumId).classList.remove('hidden');
    }

    function closeAlbum() {
      document.getElementById('albumGrid').classList.remove('hidden');
      backBtn.classList.add('hidden');
      document.querySelectorAll('.media-grid').forEach(g => g.classList.add('hidden'));
    }
  </script>

</body>
</html>
