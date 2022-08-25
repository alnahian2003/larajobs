@props(['tagsValue'])
    <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags" placeholder="PHP, Laravel, Backend etc" value="{{$tagsValue}}">
    <small class="text-slate-400 font-semibold">Press enter or comma (,) to separate tags and double click to edit</small>

    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
    <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    <script>
      var input = document.querySelector('input[name=tags]');
      new Tagify(input,
      {
        originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(','),
        maxTags: 5,
      }
      );
    </script>

