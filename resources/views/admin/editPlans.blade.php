<div class="col-sm-6 col-md-8">
    <div class="card border-white">
        <div class="card-header">Plans: {{ $data->plans }}</div>
        <div class="card-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.store.plans') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id }}">
                <div class="form-group">
                    <input type="text" class="form-control" name="plans" id="plans" aria-describedby="emailHelp" value="{{ $data->plans }}" placeholder="Name Plans">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="price" id="price" aria-describedby="emailHelp" value="{{ $data->price }}" placeholder="Price">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="description" id="nominalDeposit" aria-describedby="emailHelp" value="{{ $data->description }}" placeholder="Description">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                        <div></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
