<div class="btn-group">
    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
        Admin Menu
    </button>
    <div class="dropdown-menu dropdown-menu-right">

        <div>
            <x-navitem routeName="users.index" title="users " />

            <x-navitem routeName="logout" title="Logout" />
        </div>
    </div>
</div>
