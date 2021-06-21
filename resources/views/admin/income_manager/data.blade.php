<table class="table m-b-0 table-hover" id="income-table">
    <thead>
        <tr>
            <th>Income Date</th>
            <th>Amount</th>
            <th>Payment Method</th>
            <th>Given By</th>
            <th>Notes</th>
            <th>Income Category</th>
            <th>Added by</th>
            <th>Added on</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($income as $row)
            <tr data-id="{{encrypt($row->id)}}">
                <td>{{\Carbon\Carbon::parse($row->date)->format('d-m-Y')}}</td>
                <td>{{$row->amount}}</td>
                <td>{{$row->payment_method}}</td>
                <td>{{$row->given_by}}</td>
                <td>{{$row->note}}</td>
                <td>{{ucfirst($row->getExpenseCategory['name'])}}</td>
                <td>{{ ucwords(strtolower($row->getUser['name'])) }}</td>
                <td>{{\Carbon\Carbon::parse($row->created_at)->format('d-m-Y H:i')}}</td>
                <td>
                    <a href="#" class="a-color">
                        <button class="btn  btn-icon  btn-neutral candor-color btn-icon-mini delete-income" data-id="{{$row->id}}">
                            <i class="zmdi zmdi-delete material-icons"></i>
                        </button>
                    </a>
                </td>
            </tr>
        @empty
            <td colspan='8' class="text-center">No records available</td>
        @endforelse
    </tbody>
</table>
<ul class="pagination pagination-primary m-b-0 deletebutton">{{$income->links()}}
                    </ul>
