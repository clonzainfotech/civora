<table class="table m-b-0 table-hover" id="ivf-result-table">
    <thead>
    <tr>
        <th>Sr No</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
    @forelse($ivfPatients as $row)
        <tr data-id="{{encrypt($row->getPatients['id'])}}" class="">
            <td>{{ ((($ivfPatients->currentPage() - 1 ) * $ivfPatients->perPage() ) + $loop->iteration) . '.' }}</td>
            <td><span class="list-name">{{ ucfirst($row->getPatients['name']) }}</span></td>
        </tr>
    @empty
        <td colspan="5" class="text-center">No records available</td>
    @endforelse
    </tbody>
</table>
{{$ivfPatients->links()}}
