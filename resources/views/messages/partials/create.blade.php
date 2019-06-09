<div class="kt-portlet">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                New Message Thread
            </h3>
        </div>
    </div>

    <form class="kt-form" action="{{ route('messages.create') }}" method="post">
        @csrf
        <div class="kt-portlet__body">
            <div class="kt-section kt-section--first">
                <div class="form-group">
                    <!-- TODO: Convert to searchbox for scale -->
                    <select class="form-control kt-select2" id="recipients" name="recipients[]" multiple="multiple">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" id="subject" name="subject" class="form-control" placeholder="Subject" value="{{ old('subject') }}">
                </div>
                <div class="form-group">
                    <textarea id="message" name="message" class="form-control" rows="10" placeholder="Message">{{ old('message') }}</textarea>
                </div>
            </div>
        </div>
        <div class="kt-portlet__foot">
            <div class="kt-form__actions pull-right">
                <button type="submit" class="btn btn-primary">Create</button>
                <br>
                <br>
            </div>
        </div>
    </form>
</div>

@section('javascript')
    @parent
    <script type="application/javascript">
        $('#recipients').select2({
            placeholder: "Select the message recipient",
            maximumSelectionLength: 5,
        });
    </script>
@endsection