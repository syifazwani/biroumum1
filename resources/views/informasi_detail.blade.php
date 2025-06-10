<h1>{{ $item->title }}</h1>
<p>{!! nl2br(e($item->content)) !!}</p>
<a href="{{ url('/informasi-balai') }}">Kembali ke daftar informasi</a>
