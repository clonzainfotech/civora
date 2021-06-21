<table class="table m-b-0 table-hover" id="testimonial-table">
    <thead>
    <tr>
        <th>Sr No</th>
        <th>Testimonial</th>
        <th>Author</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @forelse($testimonial as $row)
        <tr data-id="{{encrypt($row->id)}}" class="{{in_array($row->id, [1,2,3,4,5,6,7,8,9]) ? 'main-testimonial' : ''}}">
            <td>{{ ((($testimonial->currentPage() - 1 ) * $testimonial->perPage() ) + $loop->iteration) . '.' }}</td>
            <td><span class="testimonial">{{ ucfirst($row->testimonial) }}</span></td>
            <td>{{ ucfirst($row->author) }}</td>
            <td><span class="badge badge-{{$row->status == 'Active' ? 'success' : 'danger'}}">{{$row->status}}</td>
            <td>
                <a href="#" class="a-color">
                    <button class="btn btn-icon btn-neutral candor-color btn-icon-mini delete-testimonial" data-id="{{$row->id}}">
                        <i class="zmdi zmdi-delete material-icons"></i>
                    </button>
                </a>
            </td>
        </tr>
    @empty
        <td colspan="5" class="text-center">No records available</td>
    @endforelse
    </tbody>
</table>
{{$testimonial->links()}}
