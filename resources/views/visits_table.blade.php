@extends('layouts.vstrecha')

@section('page-title')
Все встречи
@endsection


@section('content')

<table class="visits-table table table-striped table-bordered mt-1">
    <thead>
        <tr class="visits-table__first-child">
            <th class="visits-table-th">Персона</th>
            @foreach ($columns as $meeting)
                <th class="visits-table__data">
                    <a href="#" data-bs-toggle="tooltip" data-bs-html="true"
                       data-bs-title="@if ($meeting['vstrechiTheme']) {{ $meeting['vstrechiTheme'] }} @endif
                                            @if ($meeting['vstrechiTheme'] && $meeting['otv_name']) <br> @endif
                                        @if ($meeting['otv_name']) {{ $meeting['otv_name'] }} @endif
                                            @if ( ($meeting['otv_name'] && $meeting['vstrechi_place']) || ($meeting['vstrechiTheme'] && $meeting['vstrechi_place'])) <br> @endif
                                        @if ($meeting['vstrechi_place']) <i class='bi bi-geo-alt-fill text-danger'></i>{{ $meeting['vstrechi_place'] }} @endif">
                        {{ $meeting['vstrechi_data'] }}
                    </a>
                </th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($rows as $row)
            <tr class="visits-table__first-child">
                @if ($row['person_is_guest'] == 1) <td><em class="text-success">{{ $row['person_name'] }}</em></td> 
                @else<td>{{ $row['person_name'] }}</td>@endif 
                @foreach ($columns as $m)
                    <td class="vstr text-center">{{ $row[$m['vstrechi_id']] ?? '' }}</td>
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