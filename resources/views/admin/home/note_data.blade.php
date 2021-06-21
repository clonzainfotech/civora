<div class="card notes">
    <div class="header">
        <h2 class="float-left"><strong>To Do Lists</strong></h2>
    </div>
    <div class="card-body">
        <div class="list-wrapper pt-2">
            {{-- {{dd($notes)}} --}}

            @if(count($notes) >0)
                <ul class="d-flex flex-column-reverse todo-list todo-list-custom">

                    @foreach ($notes as $note)
                        <li>
                            <div class="checkbox">
                                {!! Form::checkbox('note_list', null, ($note->is_checked == 1) ? true : false,[
                                    'id' => 'note_' . $note->id,
                                    'class' => 'plan-management is-checked',
                                    'data-encrypt-id' => encrypt($note->id),
                                    'data-id' => $note->id,
                                ]) !!}

                                @php
                                    $textDecoration = ($note->is_checked == 1) ? 'note-text' : '';
                                    $closeButton = ($note->is_checked == 1) ? 'cust-delete-icon-color' : 'cust-delete-icon-red';
                                @endphp
                                <label for="note_{{$note->id}}" id="note_{{$note->id}}_label"
                                    class="notes-data {{ $textDecoration }}">
                                    <span class="notes-data">{{ str_limit($note->discription, $limit = 50, $end = '...') }}</span>
                                </label>
                            </div>

                            <a data-id="{{ encrypt($note->id) }}" id="delete-note" class="a-color remove">
                                <i class="zmdi zmdi-close {{ $closeButton }}" id="note-close-button-{{$note->id}}"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>

            @else
                <div class="text-center p-5 no-notes">No any notes</div>
            @endif

        </div>
        <div class="row add-note-group">
            <div class="add-items d-flex mb-0 mt-2 col-sm-12">
                {{ Form::text('note', null, [
                    'class'=>'form-control todo-list-input',
                    'placeholder'=>'Enter your note'
                ])}}

                <button type="button" class="add btn btn-icon text-primary todo-list-add-btn bg-transparent" id="submit-list">
                    <i class="material-icons">send</i>
                </button>
            </div>
            <div class="col-sm-12">
                <span class="form-error-msg note"></span>
            </div>
        </div>
    </div>
</div>
