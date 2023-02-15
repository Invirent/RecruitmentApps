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

        // $Quiz_Menu = '
        // <li class="nav-item">
        //     <a href="/admin/quiz-template" class="nav-link">
        //         <i class="nav-icon fas fa-user-alt"></i>
        //         <p>
        //         Quiz Template
        //         </p>
        //     </a>
        // </li>';

        echo $User_Menu;
        // echo $Quiz_Menu;
    ?>
</ul>