@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div style="margin-top: 4rem">
                <table class="table table-hover text-center" id="myTable">
                    <thead>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th>Action</th>
                    <tbody>

                    @foreach($users as $key => $user)
                        <tr>
                            <td data-label="S.N">{{++$key}}</td>
                            <td data-label="Name">
                                {{ $user->name }}
                            </td>
                            <td data-label="Email">
                                {{ $user->email }}
                            </td>
                            <td data-label="Designation">
                                {{ $user->designation }}
                            </td>
                            <td data-label="Action">
                                <form action="{{ route('user.destroy', [$user->id]) }}" method="post">
                                    @method('post')
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
                <div>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection