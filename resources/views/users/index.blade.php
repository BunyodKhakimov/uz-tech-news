@extends('layouts.demo')

@section('title', 'Users')

@section('content')
    <article class="post">
        <header>
            <div class="title">
                <h2><a href="#">@lang('info.user.title')</a></h2>
                <p>@lang('info.user.subtitle')</p>
            </div>
            <div class="meta">
                <p>@lang('info.user.welcome')</p>
                 <a class="author">
					<span class="name">
						{{ auth()->user()->name }}
					</span>
					<img src="{{ asset('images/profile.png') }}" alt="" />
				</a>
                <span class="badge badge-secondary text-capitalize">Admin</span>
            </div>
        </header>
        <div class="table-wrapper">
            <table>
                <thead>
                <tr>
                    <th>@lang('info.user.name')</th>
                    <th>@lang('form.email')</th>
                    <th>@lang('info.user.role')</th>
                    <th>@lang('header.posts')</th>
                    <th>@lang('header.actions')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th>{{ $user->name }}</th>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->admin)
                                @lang('info.role.admin')
                            @else
                                @lang('info.role.user')
                            @endif
                        </td>
                        <td>{{ $user->post()->count() }}</td>
                        <td>
                            <div class="row">
                                <a href="{{ route('users.show', $user->id) }}" class="btn icon fa-eye" title="Show"></a>
                                @if($user->admin)
                                    <a class="btn icon fa-star" title="Admin"></a>
                                @else
                                    <a href="{{ route('make-admin', $user->id) }}" class="btn icon fa-star" title="Make admin"></a>
                                @endif
                            </div>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post" id="delete_form_{{ $user->id }}">
                                <div class="row">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn icon fa-edit"
                                       title="Edit"></a>
                                    @csrf
                                    @method("DELETE")
                                    <a href="javascript:{}" onclick="document.getElementById('delete_form_{{ $user->id }}').submit();" class="btn icon fa-trash" title="Delete"></a>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        {{ $users->links() }}
    </article>
@endsection
