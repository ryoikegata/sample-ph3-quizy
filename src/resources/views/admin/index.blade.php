<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>quizy</title>
    <link href="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/html5resetcss/html5reset-1.6.css">
</head>

<body>
    <ul class="sortable">
        @foreach($big_questions as $key => $big_question)
        <li id="{{ $big_question->id }}" draggable="true">{{ $big_question->name }}</li>
        @endforeach
    </ul>

    <form action="/admin/savesort" method="post">
        @csrf
        <input type="hidden" id="listids" name="listids" />
        <input id="button" type="button" value="並び替えを保存">
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>

<script>
    document.querySelectorAll('.drag-list li').forEach(elm => {
        elm.ondragstart = function() {
            event.dataTransfer.setData('text/plain', event.target.id);
        };
        elm.ondragover = function() {
            event.preventDefault();
            this.style.borderTop = '2px solid blue';
        };
        elm.ondragleave = function() {
            this.style.borderTop = '';
        };
        elm.ondrop = function() {
            event.preventDefault();
            let id = event.dataTransfer.getData('text/plain');
            let elm_drag = document.getElementById(id);
            this.parentNode.insertBefore(elm_drag, this);
            this.style.borderTop = '';
        };
    });

    $(".sortable").sortable();
    $(".sortable").disableSelection();
    $('#button').on('click', function() {
        var listIds = $(".sortable").sortable("toArray");
        $("#listids").val(listIds);
        $("form").submit();
    });
</script>

</html>