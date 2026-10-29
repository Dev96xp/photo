<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Selected photos — {{ $session->name }}</title>
    <style>
        body { font-family: Arial, sans-serif; color: #111; margin: 30px; font-size: 13px; }
        h1 { font-size: 20px; margin: 0 0 4px; }
        .meta { color: #555; margin-bottom: 20px; }
        .gallery { margin-bottom: 20px; page-break-inside: avoid; }
        h2 { font-size: 15px; border-bottom: 1px solid #999; padding-bottom: 4px; margin: 0 0 6px; }
        ol { margin: 0; padding-left: 22px; columns: 3; }
        li { padding: 1px 0; }
        .empty { color: #888; font-style: italic; }
        .actions { margin-bottom: 20px; }
        @media print { .actions { display: none; } body { margin: 0; } }
    </style>
</head>
<body>
    <div class="actions">
        <button onclick="window.print()">Imprimir</button>
    </div>

    <h1>{{ $session->name }}</h1>
    <div class="meta">
        @if($session->date) {{ $session->date->format('M d, Y') }} &bull; @endif
        {{ $session->galleries->sum(fn ($g) => $g->images->where('status', 2)->count()) }} fotos seleccionadas
    </div>

    @foreach($session->galleries as $gallery)
        @php $selectedImages = $gallery->images->where('status', 2); @endphp
        <div class="gallery">
            <h2>{{ $gallery->name }} ({{ $selectedImages->count() }} de {{ $gallery->images->count() }})</h2>
            @if($selectedImages->count())
                <ol>
                    @foreach($selectedImages as $image)
                        <li>{{ $image->name ?? basename($image->url) }}</li>
                    @endforeach
                </ol>
            @else
                <p class="empty">Sin fotos seleccionadas</p>
            @endif
        </div>
    @endforeach

    <script>window.onload = () => window.print();</script>
</body>
</html>
