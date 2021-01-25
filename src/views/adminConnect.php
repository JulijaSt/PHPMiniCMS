<?php
include "adminHeader.php";
?>

<main class="main">
    <div class="main__wrapper">
        <?php
            if (isset($_SESSION['success_message'])) {
                print("<button class='main__success' onclick='document.querySelector(\".main__success\").style.display=\"none\";'>" . $_SESSION['success_message'] . "</button>");
                unset($_SESSION['success_message']);
            }
            
        ?>
        <div class="main__title-wrapper">
            <h1 class="main__title">Manage Pages</h1>
            <a href="admin/edit-page?action=add"><button class="btn">Add Page</button></a>
        </div>
        <table class="page-table">
            <thead class="page-table__head">
                <tr class="page-table__row page-table__row--head">
                    <th class="page-table__column page-table__column--head">Title</th>
                    <th class="page-table__column page-table__column--head">Actions</th>
                </tr>
            </thead>
            <tbody class="page-table__body">
                <?php

                include_once "bootstrap.php";

                $page = $entityManager->getRepository('Models\Page')->findAll();

                if (count($page) > 0) {
                    foreach ($page as $p)
                        print("<tr class='page-table__body-row'>
                                    <td class='page-table__column'>" . $p->getTitle() . "</td>
                                    <td class='page-table__column'>"
                                    .($p->getTitle() != "home" ?
                                        "<a href='admin/edit-page?delete={$p->getPageId()}'>
                                            <button class='btn btn--delete' onclick='return confirm(\"Are you sure you want to delete this page?\")'>Delete</button>
                                        </a>" : "") .
                                    "</td>
                                </tr>");
                } else {
                    print("<tr class='page-table__body-row'>
                            <td class='page-table__column'></td>
                            <td class='page-table__column'></td>
                        </tr>");
                }
                ?>
            <tbody>
        </table>
    </div>
</main>

<?php
include "adminFooter.php";
?>