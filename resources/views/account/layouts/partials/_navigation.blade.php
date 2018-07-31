<div class="card">
    <div class="card-body">
        <ul class="nav nav-pills flex-column nav-fill">
            <li class="nav-item">
                <a class="nav-link{{ active_if_on('account') }}" href="{{ route('account.index') }}">Account overview</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ active_if_on('account/profile') }}" href="{{ route('account.profile.index') }}">Update profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ active_if_on('account/password') }}" href="{{ route('account.password.index') }}">Change password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link{{ active_if_on('account/deactivate') }}" href="{{ route('account.deactivate.index') }}">Deactivate Account</a>
            </li>
        </ul>
    </div>
</div>