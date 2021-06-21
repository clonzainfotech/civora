<table class="table m-b-0" id="indoorsetting-table">
    <thead>
        <tr>
            <th>Sr No</th>
            <th>Room Type</th>
            <th>Total Room</th>
            <th>Total Bed</th>
            <th>Room Charge</th>
            <th>Nursing Charge</th>
            <th>Dr. Visit Charge</th>
            <th>Action</th>
        </tr>
    </thead>
    <?php  $count = 1; ?>
    @foreach($indoorRooms as $indoor)
        <tbody>
                <tr data-id="{{encrypt($indoor->id)}}">
                    <td>{{ (($indoorRooms->currentPage() - 1 ) * $indoorRooms->perPage()) + $loop->iteration }}</td>
                    <td>{{ ucwords(strtolower($indoor->name)) }}</td>
                    <td>{{ $indoor->rooms_count }}</td>
                    <td>
                        @php
                            $index = ((($indoorRooms->currentPage() - 1 ) * $indoorRooms->perPage()) + $loop->iteration) - 1;
                        @endphp
                        @if (isset($indoorBeds[$index]) && $indoorBeds[$index]->id == $indoor->id)
                            {{ $indoorBeds[$index]->bed_count }}
                        @else
                            0
                        @endif
                    </td>
                    <td>{{ $indoor->price }}</td>
                    <td>{{ $indoor->nursing_charge }}</td>
                    <td>{{ $indoor->dr_visit_charge }}</td>
                    <td>
                        <a href="#" class="a-color">
                            <button class="btn btn-icon btn-neutral candor-color btn-icon-mini delete-indoor-type" data-id="{{ encrypt($indoor->id) }}">
                                <i class="zmdi zmdi-delete material-icons"></i>
                            </button>
                        </a>
                    </td>
                </tr>
        </tbody>
    @endforeach
</table>

{{ $indoorRooms->links() }}
