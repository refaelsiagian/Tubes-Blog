<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">

                <h6 class="sidebar-heading d-flex justify-content-start align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                    <a class="link-secondary text-decoration-none" href="{{ route('post.index') }}" aria-label="Add a new report">
                        <i class="bi bi-arrow-left-circle"></i>
                        <span class="ms-2">Back to Blog</span>
                    </a>
                </h6>

                <hr class="my-3">
                
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{ route('posts.index') }}">
                        <i class="bi bi-file-earmark-text"></i>
                        Posts
                    </a>
                </li>
                
                @can('admin')
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('categories.index')}}">
                        <i class="bi bi-tags-fill"></i>
                        Categories
                    </a>
                </li>
                @endcan

                <hr class="my-3">

                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <svg class="bi"><use xlink:href="#people"/></svg>
                        Nanti
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <svg class="bi"><use xlink:href="#graph-up"/></svg>
                        Nanti
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="#">
                        <svg class="bi"><use xlink:href="#puzzle"/></svg>
                        Nanti
                    </a>
                </li>
            </ul>

            {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>Log Out</span>
            </h6> --}}

            <hr class="my-3">

            <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="{{ route('logout') }}">
                        <svg class="bi"><use xlink:href="#door-closed"/></svg>
                        Sign out
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>