@extends('layouts.vstrecha')

@section('page-title')
Все встречи
@endsection


@section('content')

<table class="visits-table table table-striped table-bordered mt-1">
    <thead>
        <tr>
            <th>Персона</th>
            @foreach ($columns as $meeting)
                <th>
                    <a href="#" data-bs-toggle="tooltip" data-bs-html="true"
                    data-bs-title="{{ $meeting['vstrechiTheme'] }}<br>отв.{{ $meeting['otv_name'] }}">
                        {{ $meeting['vstrechi_data'] }}
                    </a>
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
            <tr>
                <td>{{ $row['person_name'] }}</td>
                @foreach ($columns as $m)
                    <td class="text-center">{{ $row[$m['vstrechi_id']] ?? '' }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

<script>
  const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
  const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

  var tooltipTriggerList = Array.prototype.slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
})
</script>

@endsection