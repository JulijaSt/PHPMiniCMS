<?php

function footer($footer) {
    print ("<footer class='" .$footer . "'>
                <div class='footer__wrapper'>
                    <p class='footer__copyright'>copyright &copy" . date("Y") . " Mini CMS</p>
                </div>
            </footer>");
}

?>