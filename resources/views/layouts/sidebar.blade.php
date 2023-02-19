<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <?php
        $User_Menu = '
        <li class="nav-item">
            <a href="/admin/users" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                User
                </p>
            </a>
        </li>';

        $Quiz_Menu = '
        <li class="nav-item">
            <a href="/admin/quiz-template" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                Quiz Template
                </p>
            </a>
        </li>';

        $Jobs_Menu = '
        <li class="nav-item">
            <a href="/admin/jobs" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                Jobs
                </p>
            </a>
        </li>';

        $Candidate_Menu = '
        <li class="nav-item">
            <a href="/admin/candidates" class="nav-link">
                <i class="nav-icon fas fa-user-alt"></i>
                <p>
                Candidates
                </p>
            </a>
        </li>';

        echo $User_Menu;
        echo $Quiz_Menu;
        echo $Jobs_Menu;
        echo $Candidate_Menu;
    ?>
</ul>