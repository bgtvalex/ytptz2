
<ul class="list-inline" id="person_list">
    @foreach($visitors as $visitor)
        <li class="person_added list-inline-item mt-1">
            <div class="btn-group btn-group" role="group">
                <span class="btn btn-outline-primary">{{$visitor->fio}}</span>
                <button type="button" id="person_{{$visitor->person_id}}" class="person_del btn btn-primary display-3">X</button>
            </div>
        </li>
    @endforeach
</ul>