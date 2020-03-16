<?php
    /**
     * Created by PhpStorm.
     * User: Eric McWinNEr
     * Date: 1/3/2018
     * Time: 10:36 PM
     */
    if ($numberOfPages === 0) {

    } else {
        if ($numberOfPages === 1) {

        } else if ($numberOfPages === 2) {
            if ($page === 1) {
                echo '<ul><li><a href="messages.php?page=1" class="selected">1</a></li> ' .
                    ' <li><a href="messages.php?page=2">2</a></li></ul>';
            } else {
                echo '<ul><li><a href="messages.php?page=1">1</a></li> ' .
                    ' <li><a href="messages.php?page=2" class="selected">2</a></li>';
            }
        } else if ($page === 1) {
            echo '<ul><li><a href="messages.php?page=' . $page . '" class="selected">' . $page . '</a></li> ' .
                ' <li><a href="messages.php?page=' . ($page + 1) . '">' . ($page + 1) . '</a></li>' .
                ' <li><a href="messages.php?page=' . ($page + 2) . '">' . ($page + 2) . '</a></li>' .
                ' <li><a href="messages.php?page=' . ($page + 1) . '" class="actions"><i class="fa fa-angle-right"></i></a></li> ' .
                ' <li><a href="messages.php?page=' . $numberOfPages . '" class="actions"><i class="fa fa-angle-double-right"></i></a></li></ul>';
        } else if ($page === $numberOfPages || $page > $numberOfPages) {
            echo '<ul><li><a href="messages.php?page=1" class="actions"><i class="fa fa-angle-double-left"></i></a></li>' .
                ' <li><a href="messages.php?page=' . ($page - 1) . '" class="actions"><i class="fa fa-angle-left"></i></a></li> ' .
                ' <li><a href="messages.php?page=' . ($page - 1) . '">' . ($page - 1) . '</a></li>' .
                ' <li><a href="messages.php?page=' . ($page - 2) . '">' . ($page - 2) . '</a></li>' .
                ' <li><a href="messages.php?page=' . $page . '" class="selected">' . $page . '</a></li></ul><li> ';
        } else {
            if (($page + 2) > $numberOfPages) {
                echo '<ul><li><a href="messages.php?page=1" class="actions"><i class="fa fa-angle-double-left"></i></a></li>' .
                    ' <li><a href="messages.php?page=' . ($page - 1) . '" class="actions"><i class="fa fa-angle-left"></i></a></li> ' .
                    ' <li><a href="messages.php?page=' . $page . '" class="selected">' . $page . '</a></li> ' .
                    ' <li><a href="messages.php?page=' . ($page + 1) . '">' . ($page + 1) . '</a></li>' .
                    ' <li><a href="messages.php?page=' . ($page + 1) . '" class="actions"><i class="fa fa-angle-right"></i></a></li>' .
                    '<li><a href="messages.php?page=' . $numberOfPages . '" class="actions"><i class="fa fa-angle-double-right"></i></a></li></ul>';
            } else {
                echo '<ul><li><a href="messages.php?page=1" class="actions"><i class="fa fa-angle-double-left"></i></a></li>' .
                    ' <li><a href="messages.php?page=' . ($page - 1) . '" class="actions"><i class="fa fa-angle-left"></i></a></li> ' .
                    ' <li><a href="messages.php?page=' . $page . '" class="selected">' . $page . '</a></li> ' .
                    ' <li><a href="messages.php?page=' . ($page + 1) . '">' . ($page + 1) . '</a></li>' .
                    ' <li><a href="messages.php?page=' . ($page + 2) . '">' . ($page + 2) . '</a></li>' .
                    ' <li><a href="messages.php?page=' . ($page + 1) . '" class="actions"><i class="fa fa-angle-right"></i></a></li>' .
                    ' <li><a href="messages.php?page=' . $numberOfPages . '" class="actions"><i class="fa fa-angle-double-right"></i></a></li></ul>';
            }

        }
    }