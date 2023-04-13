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
        $Quizzes_Menu = '
        <li class="nav-item">
            <a href="/admin/quiz-template" class="nav-link">
                <i class="nav-icon fas fa-pencil-alt"></i>
                <p>
                Quiz Template
                </p>
            </a>
        </li>';
        $Jobs_Menu = '
        <li class="nav-item">
            <a href="/admin/jobs" class="nav-link">
                <i class="nav-icon fas fa-user-tie"></i>
                <p>
                Jobs
                </p>
            </a>
        </li>';
        $Candidates_Menu = '
        <li class="nav-item">
            <a href="/admin/candidates" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                Candidate
                </p>
            </a>
        </li>';

        $Company_Menu = '
        <li class="nav-item">
            <a href="/admin/company" class="nav-link">
                <i class="nav-icon fas fa fa-building"></i>
                <p>
                Company
                </p>
            </a>
        </li>';

        echo $User_Menu;
        echo $Candidates_Menu;
        echo $Jobs_Menu;
        echo $Quizzes_Menu;

        if (isset($_SESSION['user']) && $_SESSION['user']['id'] == 1) {
            echo $Company_Menu;
        }

    ?>

</ul>