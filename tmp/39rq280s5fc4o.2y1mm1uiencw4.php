<ul class="navbar-nav mx-lg-auto my-2 my-lg-0 navbar-nav-scroll">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="<?= ($BASE) ?>/">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= ($BASE) ?>/about">About Us</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= ($BASE) ?>/services">Our Services</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#Pages" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Properties <span class="fa fa-angle-down ms-1"></span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item pt-2" href="<?= ($BASE) ?>/properties/sale">For Sale</a></li>
            <li><a class="dropdown-item" href="<?= ($BASE) ?>/properties/rent">For Rent</a></li>
            <li><a class="dropdown-item" href="<?= ($BASE) ?>/properties/lease">For Lease</a></li>
            <li><a class="dropdown-item" href="<?= ($BASE) ?>/properties/airbnb">AirBnB</a></li>

        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= ($BASE) ?>/contact">Contact Us</a>
    </li>
</ul>