<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->



    @if ($users->count())
    <!--begin::Table-->
    <div class="table-responsive">
        <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
            <thead>
                <tr class="text-left text-uppercase">
                    <th style="min-width: 120px">Name</th>
                    <th style="min-width: 130px">Email</th>
                    <th style="min-width: 130px">Balance</th>
                    <th style="min-width: 130px">Added At</th>
                    <th style="min-width: 130px" class="pr-4 text-right">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="pl-0">
                            <span class="text-dark-75 font-weight-bolder mb-1 font-size-lg">{{ $user->name }}</span>
                            <span class="text-muted font-weight-bold text-muted d-block"></span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $user->email }}</span>
                            <span class="text-muted font-weight-bold"></span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $user->wallets->first()->amount }}</span>
                            <span class="text-muted font-weight-bold"></span>
                        </td>
                        <td>
                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{ $user->created_at->format('F d, Y') }}</span>
                            <span class="text-muted font-weight-bold"></span>
                        </td>
                        <td class="pr-4 text-right">
                            <a href="{{ route('admin.users.single', ['user' => $user->id ]) }}" class="btn btn-light-success font-weight-bolder font-size-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!--end::Table-->
    @else
    <h3 class="text-center">
        {{ $noitems }}
    </h3>
    @endif


</div>