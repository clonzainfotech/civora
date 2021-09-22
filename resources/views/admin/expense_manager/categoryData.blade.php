<table class="table m-b-0 table-hover" id="expense-table">
    <thead>
        <tr>
            <th>Sr.</th>
            <th>Category</th>
            <th>Created by</th>
            <th>Status</th>
            <th>Pediatic</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
          @forelse($expense as $row)
            <tr data-id="{{encrypt($row->id)}}">
                <td>{{(($expense->currentPage() - 1 ) * $expense->perPage() ) + $loop->iteration}}</td>
                <td>{{$row->name}}</td>
                <td>{{ ucwords(strtolower($row->getUser['name'])) }}</td>
                <td>@if($row->status == 1)
                    <span class="badge text-success"> Active</span>
                    @else
                    <span class="badge text-danger"> Deactive</span>
                    @endif</td>
                <td>{{!empty($row->is_pediatric) ? 'YES' : 'NO'}}</td>
                <td>
                    <a href="#" class="a-color" data-toggle="modal" data-target="#Updatectegory">
                        <button class="btn  btn-icon  btn-neutral candor-color btn-icon-mini edit-expense" data-id="{{$row->id}}" data-name="{{$row->name}}" data-status="{{$row->status}}">
                            <i class="zmdi zmdi-edit material-icons"></i>
                        </button>
                    </a>
                </td>
            </tr>
        @empty
            <td colspan='8' class="text-center">No records available</td>
        @endforelse
    </tbody>
</table>
                    {{$expense->links()}}
