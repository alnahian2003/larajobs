@props(['allTags'])

@php
    $tags = explode(', ', $allTags);
@endphp

<ul class="flex">
    @foreach ($tags as $tag)
    <li class="bg-slate-800 text-white rounded-full px-3 py-1 mr-2">
        <a href="?tag={{$tag}}">{{$tag}}</a>
    </li>
    @endforeach
</ul>