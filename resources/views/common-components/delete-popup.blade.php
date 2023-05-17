<div class="col-xl-4 col-md-6">
    <div class="mt-4">
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">{{__('Delete')}} {{ $name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{__('Are you sure to delete')}} {{ $name }}?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{__('No')}}</button>
                        {!! Form::open(['route' => ['categories.destroy', 12345678910], 'id'=>"delete_popup_action", 'method' => 'delete']) !!}
                        {!! Form::button(__("Yes"), ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('page_scripts')
    <script>

        $('#staticBackdrop').on('click', function (event) {
            var button = $(event.relatedTarget)
            var name = button.data('whatever')
            var modal = $(this);
            modal.find('.modal-title').text('Usuń ' + name );
            modal.find('#delete_popup_action').attr('action',button.data('destroy-url'));
        })
    </script>
@endpush
