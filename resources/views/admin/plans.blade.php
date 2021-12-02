<div class="col-sm-6 col-md-8">
    <div class="card border-white">
        <div class="card-header">Plans</div>
        <div class="card-body">
            <!-- <p class="card-text">Welcome.</p> -->
            <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Plans</th>
                    <th scope="col">Price</th>
                    <th scope="col">Description</th>
                    <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                @php $count = 1 @endphp
                @foreach ($data as $key => $result)
                    <tr>
                        <td colspan="5"><img src="{{ route("images.path", $result->images->file_path) }}" class="img-thumbnail"></td>
                    </tr>
                    <tr>
                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $result->plans }}</td>
                        <td>Rp. @money($result->price)</td>
                        <td>{{ $result->description }}</td>
                        <td><a href="{{ route("admin.edit.plans", ["id" => $result->id]) }}?pages=@md5("admin.editPlans")">edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
