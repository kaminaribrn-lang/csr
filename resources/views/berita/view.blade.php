<h1 class="text-2xl font-bold">{{ $data->headline }}</h1>

<p class="text-sm text-gray-500">
    {{ $data->tanggal }} • Dilihat {{ $data->dilihat }}x
</p>

@if($data->gambar)
<img src="{{ asset('storage/'.$data->gambar) }}" class="my-4 w-full rounded">
@endif

<div class="prose max-w-none">
    {!! $data->berita !!}
</div>

<p class="mt-4 text-sm">
    #{{ $data->hastag }}
</p>